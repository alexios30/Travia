<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/navbar.css">

</head>

<body id="page-content">

<!-- Navbar Bootstrap -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Travia</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../src/home.php">HomePage</a>
                </li>
                <li class="nav-item">
                    <button class="btn btn-secondary" onclick="toggleFont()">Switch to Galactic Font</button>
                </li>
            </ul>
        </div>
    </div>
</nav>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Vérifier l'état de la police dans le localStorage
    document.addEventListener("DOMContentLoaded", () => {
        const pageContent = document.getElementById('page-content');
        const buttonElement = document.querySelector('.btn-secondary');

        // Vérifier la police actuelle stockée
        const isAurabeshStored = localStorage.getItem("isAurabesh") === "true";

        if (isAurabeshStored) {
            pageContent.classList.add('aurabesh');
            buttonElement.textContent = 'Switch to Standard Font';
        } else {
            buttonElement.textContent = 'Switch to Galactic Font';
        }
    });

    let isAurabesh = localStorage.getItem("isAurabesh") === "true"; // Charger l'état initial

    function toggleFont() {
        const pageContent = document.getElementById('page-content');
        const buttonElement = document.querySelector('.btn-secondary');

        // Basculer entre les polices et stocker dans localStorage
        if (!isAurabesh) {
            pageContent.classList.add('aurabesh');
            buttonElement.textContent = 'Switch to Standard Font';
        } else {
            pageContent.classList.remove('aurabesh');
            buttonElement.textContent = 'Switch to Galactic Font';
        }

        isAurabesh = !isAurabesh; // Inverser l'état
        localStorage.setItem("isAurabesh", isAurabesh); // Sauvegarder l'état
    }
</script>

</body>

</html>
