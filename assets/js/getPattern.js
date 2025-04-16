const loadData = async () => {
  const urlParams = new URLSearchParams(window.location.search);
  const type = urlParams.get('type'); // crochet ou tricot
  const apiUrl = type === 'crochet' ? 'http://localhost:8000/crochet.php' : 'http://localhost:8000/tricot.php';

  try {
    const response = await fetch(apiUrl);
    const data = await response.json();

    const main = document.querySelector('main');
    main.innerHTML = ''; 
    
    data.forEach(pattern => {
      const article = document.createElement('article');
      article.classList.add('pattern-card');

      const title = document.createElement('h2');
      title.textContent = pattern.title;
      article.appendChild(title);

      const img = document.createElement('img');
      img.src = `/assets/pics/pattern_img/${pattern.pic}`;
      img.alt = pattern.title;
      article.appendChild(img);

      const description = document.createElement('p');
      description.textContent = pattern.text;
      article.appendChild(description);

      const difficulty = document.createElement('p');
      difficulty.textContent = "Difficulté : " + pattern.difficulty;
      article.appendChild(difficulty);

      main.appendChild(article);
    });
  } catch (error) {
    console.error('Erreur lors du chargement des patrons', error);
  }
};

const searchInput = document.querySelector('input');
const suggestionsBox = document.querySelector('.result-box');
const suggestionsList = document.querySelector('.result-box ul');

searchInput.addEventListener('input', async () => {
  const query = searchInput.value;
  const url = new URL('http://localhost:8000/assets/php/search.php');
  url.searchParams.append('search', query);

  const response = await fetch(url.toString());

  if (response.ok) {
    const data = await response.json();
    suggestionsList.innerHTML = ''; 

    if (data.length > 0) {
      suggestionsBox.style.display = 'block'; 

      data.forEach(pattern => {
        const suggestionItem = document.createElement('li');
        suggestionItem.textContent = pattern.title;
        suggestionsList.appendChild(suggestionItem);
      });
    } else {
      suggestionsBox.style.display = 'none';
    }
  } else {
    console.error('Erreur lors de la récupération des données de recherche');
  }
});

loadData();