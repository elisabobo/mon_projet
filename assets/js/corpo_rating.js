(function () {
    const container = document.getElementById('companies-container');
    const modal = document.getElementById('company-modal');

    if (!container || !modal) {
        return;
    }

    const closeButton = modal.querySelector('.company-modal-close');
    const nameElement = document.getElementById('company-name');
    const sectorElement = document.getElementById('company-sector');
    const ratingNoteElement = document.getElementById('company-rating-note');
    const ratingScoreElement = document.getElementById('company-rating-score');
    const detailsElement = document.getElementById('company-details');

    const detailFields = [
        { key: 'currentRatio', label: 'Liquidité', format: formatRatio },
        { key: 'cashRatio', label: 'Cash ratio', format: formatRatio },
        { key: 'debtRatio', label: 'Dette', format: formatPercent },
        { key: 'debtEquityRatio', label: 'Dette / capitaux propres', format: formatRatio },
        { key: 'netProfitMargin', label: 'Marge nette', format: formatPercent },
        { key: 'operatingProfitMargin', label: 'Marge opérationnelle', format: formatPercent },
        { key: 'returnOnEquity', label: 'Rentabilité', format: formatPercent },
        { key: 'operatingCashFlowSalesRatio', label: 'Cash-flow / ventes', format: formatPercent }
    ];

    fetch('/assets/dataset/corporate_rating_clean.csv')
        .then(function (response) {
            if (!response.ok) {
                throw new Error('Impossible de charger les entreprises.');
            }
            return response.text();
        })
        .then(function (csvText) {
            const companies = parseCSV(csvText);
            renderCompanies(companies);
        })
        .catch(function () {
            container.innerHTML = '<p>Les informations des entreprises ne sont pas disponibles pour le moment.</p>';
        });

    closeButton.addEventListener('click', function () {
        modal.close();
    });

    modal.addEventListener('click', function (event) {
        if (event.target === modal) {
            modal.close();
        }
    });

    function renderCompanies(companies) {
        container.innerHTML = '';

        companies.forEach(function (company) {
            const card = document.createElement('article');
            card.className = 'company-card';
            card.tabIndex = 0;
            card.setAttribute('role', 'button');
            card.setAttribute('aria-label', 'Voir les details de ' + company.Name);

            card.innerHTML =
                '<h3>' + escapeHTML(company.Name) + '</h3>' +
                "<span class=\"company-more-info\">Plus d'info</span>";

            card.addEventListener('click', function () {
                openCompanyModal(company);
            });

            card.addEventListener('keydown', function (event) {
                if (event.key === 'Enter' || event.key === ' ') {
                    event.preventDefault();
                    openCompanyModal(company);
                }
            });

            container.appendChild(card);
        });
    }

    function openCompanyModal(company) {
        nameElement.textContent = company.Name;
        sectorElement.textContent = company.Sector;
        ratingNoteElement.textContent = company.rating_note;
        ratingScoreElement.textContent = 'Score ' + formatScore(company.rating_num) + '/10';

        detailsElement.innerHTML = '';
        detailFields.forEach(function (field) {
            const item = document.createElement('li');
            item.innerHTML = '<span>' + field.label + '</span><strong>' + field.format(company[field.key]) + '</strong>';
            detailsElement.appendChild(item);
        });

        modal.showModal();
    }

    function parseCSV(text) {
        const rows = [];
        let row = [];
        let value = '';
        let inQuotes = false;

        for (let i = 0; i < text.length; i++) {
            const char = text[i];
            const nextChar = text[i + 1];

            if (char === '"' && inQuotes && nextChar === '"') {
                value += '"';
                i++;
            } else if (char === '"') {
                inQuotes = !inQuotes;
            } else if (char === ',' && !inQuotes) {
                row.push(value);
                value = '';
            } else if ((char === '\n' || char === '\r') && !inQuotes) {
                if (char === '\r' && nextChar === '\n') {
                    i++;
                }
                row.push(value);
                rows.push(row);
                row = [];
                value = '';
            } else {
                value += char;
            }
        }

        if (value || row.length) {
            row.push(value);
            rows.push(row);
        }

        const headers = rows.shift();
        return rows
            .filter(function (currentRow) {
                return currentRow.length === headers.length && currentRow[0];
            })
            .map(function (currentRow) {
                return headers.reduce(function (company, header, index) {
                    company[header] = currentRow[index];
                    return company;
                }, {});
            });
    }

    function formatScore(value) {
        return Number(value).toFixed(1);
    }

    function formatRatio(value) {
        return Number(value).toFixed(2);
    }

    function formatPercent(value) {
        return (Number(value) * 100).toFixed(1) + ' %';
    }

    function escapeHTML(value) {
        const div = document.createElement('div');
        div.textContent = value;
        return div.innerHTML;
    }
})();
