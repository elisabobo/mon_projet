<?php if (isset($_GET['status'])): ?>
    <?php
        $message = '';
        if ($_GET['status'] === 'deleted') {
            $message = 'Le patron a bien été supprimé.';
        } elseif ($_GET['status'] === 'success' && isset($type)) {
            $message = 'Le patron de ' . htmlspecialchars($type) . ' a bien été créé.';
        }
    ?>

    <?php if ($message): ?>
        <div id="alert-success" class="alert-success" style="margin-top: 1rem; color: #f47288; font-weight: bold; transition: opacity 1s ease;">
            <?= $message ?>
        </div>
        <script>
            window.addEventListener('DOMContentLoaded', () => {
                const alertBox = document.getElementById('alert-success');

                setTimeout(() => {
                    alertBox.style.opacity = '0';
                }, 2000);

                setTimeout(() => {
                    if (alertBox) {
                        alertBox.remove();
                    }
                    const url = new URL(window.location.href);
                    url.searchParams.delete('status');
                    window.history.replaceState({}, document.title, url.pathname);
                }, 2500);
            });
        </script>
    <?php endif; ?>
<?php endif; ?>