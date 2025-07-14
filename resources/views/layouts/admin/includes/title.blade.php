<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta property="og:description" content="Kn/ kilinochchi Maha Vidyalayam is a school where excellence in education, cultural enrichment, and innovation converge to empower students in the heart of Kilinochchi.">
    <meta name="description" content="Kn/ kilinochchi Maha Vidyalayam is a school where excellence in education, cultural enrichment, and innovation converge to empower students in the heart of Kilinochchi.">
    <meta name="author" content="Kn/ kilinochchi Maha Vidyalayam">

    <title>KMV | <?php echo $title ?? 'Admin Dashboard' ?></title>
    <link rel="canonical" href="https://kmv.lk" />
    <meta name="keywords" content="School,student, Best school in Kilinochchi, nothern province">

    <meta property="og:title" content="Kn/ kilinochchi Maha Vidyalayam">
    <meta property="og:description" content="Kn/ kilinochchi Maha Vidyalayam is a school where excellence in education, cultural enrichment, and innovation converge to empower students in the heart of Kilinochchi.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.kmv.lk">
    <meta property="og:image" content="https://www.kmv.lk/web/assets/images/main/kmv-logo.png">

    <!-- Fav Icon -->
    <link rel="shortcut icon" href="{{ asset('web/assets/images/main/favicon.ico') }}" sizes="16x16">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('web/assets/css/bootstrap.min.css') }}" rel="stylesheet" onerror="this.href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'">
    <link href="{{ asset('web/assets/css/all.css') }}" rel="stylesheet" onerror="this.href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css'">
    <link href="{{ asset('web/assets/css/owl.carousel.css') }}" rel="stylesheet" onerror="this.href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css'">

    <link href="{{ asset('web/assets/rs-plugin/css/settings.css') }}" rel="stylesheet">
    <link href="{{ asset('web/assets/css/jquery.fancybox.min.css') }}" rel="stylesheet" type="text/css" media="screen" onerror="this.href='https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css'">
    <link href="{{ asset('web/assets/css/animate.css') }}" rel="stylesheet" onerror="this.href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css'">
    <link href="{{ asset('web/assets/css/style.css') }}" rel="stylesheet" id="colors">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet">

    <style>
        .footer-wrap p, .footer-links li a, .footer-adress li span a, .footer-adress li span,
        .footer-wrap h3, .footer-adress li > i {
            color: #500d0a !important;
        }

        .loader-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .loader {
            border: 8px solid #f3f3f3;
            border-top: 8px solid #481210;
            border-radius: 50%;
            width: 100px;
            height: 100px;
            animation: spin 1s linear infinite;
        }

        .loader-logo {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80px;
            height: 80px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
