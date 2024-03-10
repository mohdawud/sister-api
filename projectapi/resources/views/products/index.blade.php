<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk Minuman</title>

    <!-- Tambahkan link CSS Slick Carousel -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Gaya CSS -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh; /* Menentukan tinggi halaman secara penuh */
        }

        /* Gaya untuk navbar */
        .navbar {
            color: white;
            padding: 15px;
            text-align: center;
            width: 100%;
            position: fixed; /* Navbar akan tetap di atas saat di-scroll */
            top: 0;
            z-index: 1000; /* Menentukan lapisan (layer) */
        }

        /* Container utama */
        .carousel-container {
            width: 80%;
            margin-top: 70px; /* Menambahkan margin atas untuk memberikan ruang pada navbar */
            overflow-x: auto;
            white-space: nowrap;
        }

        /* Gaya untuk setiap kartu (card) */
        .card {
            border: 1px solid #2c2b2b;
            border-radius: 8px;
            padding: 16px;
            margin: 8px;
            width: 200px;
            text-align: center;
            display: inline-block;
            vertical-align: top;
            position: relative;
        }

        /* Gambar dalam kartu */
        .card img {
            max-width: 100%;
            height: auto;
            border-radius: 4px;
            margin-bottom: 8px;
        }

        /* Tulisan di tengah kartu */
        .card h2 {
            margin-bottom: 10px;
        }

        /* Gaya untuk tombol navigasi */
        .slick-prev {
            left: 0;
        }

        .slick-next {
            right: 0;
        }

        /* Gaya untuk input pencarian */
        .search-container {
            margin-top: 20px;
        }

        .search-container input {
            width: 200px;
            margin-right: 10px;
        }
        /* Gaya untuk setiap kartu (card) */
.card {
    border: 1px solid #5f5f5f;
    border-radius: 8px;
    padding: 16px;
    margin: 8px;
    width: 200px;
    text-align: center;
    display: inline-block;
    vertical-align: top;
    position: relative;
    transition: transform 0.3s; /* Efek transisi untuk hover */
}

/* Efek hover pada kartu */
.card:hover {
    transform: scale(1.05); /* Memperbesar kartu saat dihover */
}

/* Gambar dalam kartu */
.card img {
    max-width: 100%;
    height: auto;
    border-radius: 4px;
    margin-bottom: 8px;
}

/* Tulisan di tengah kartu */
.card h2 {
    margin-bottom: 10px;
}

    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Chatime</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
            </ul>
            <form class="d-flex search-container">
              <input class="form-control me-2" type="search" placeholder="Search by name" aria-label="Search" id="searchInput">
              <button class="btn btn-outline-success" type="button" onclick="searchProduct()">Search</button>
            </form>
          </div>
        </div>
      </nav>

    <h1>Daftar Produk Minuman Chatime</h1>

    <!-- Container untuk carousel -->
    <div class="carousel-container">
        <!-- Slider Slick Carousel -->
        <div class="slick-slider">
            @foreach($product as $product)
                <div class="card">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="card-img-top">
                    <h2>{{ $product->name }}</h2>
                    <p>RP {{ $product->description }}</p>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Script JavaScript untuk inisialisasi Slick Carousel -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.slick-slider').slick({
                infinite: false,
                slidesToShow: 3,
                slidesToScroll: 1,
                Arrow: '<button type="button" class="slick-prev">Previous</button>',
                nextArrow: '<prevbutton type="button" class="slick-next">Next</prevbutton>',
            });
        });

        function searchProduct() {
            var input, filter, cards, card, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            cards = document.querySelectorAll(".card");

            cards.forEach(function(card) {
                var title = card.querySelector("h2");
                txtValue = title.textContent || title.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    card.style.display = "";
                } else {
                    card.style.display = "none";
                }
            });
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>
</html>
