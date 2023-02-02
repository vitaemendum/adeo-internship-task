<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <script src="//onpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        import tailwind from "laravel-mix/src/Mix";

        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#ef3b2d",
                    },
                },
            },
        };
    </script>
    <title>adeoWeather | Find what to wear by weather</title>
</head>
<body class="mb-48">
<nav class="bg-gray-800 p-6 mb-20">
    <div class="container mx-auto flex items-center justify-between">
        <a class="text-white font-bold text-xl" href="/">adeoWeather</a>
        <div>
            <a class="text-white mr-4 hover:text-gray-400" href="/">Wardrobe</a>
            <a class="text-white mr-4 hover:text-gray-400" href="/recommended">What to wear</a>
        </div>
    </div>
</nav>
<main>
    {{$slot}}
</main>
<footer
    class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-gray-200 text-black h-24 mt-24 opacity-90 md:justify-center"
>
    <p class="ml-2 text-xs">Copyright &copy; 2023, All Rights reserved</p>

    <a
        href="/products/create"
        class="absolute top-1/3 right-10 bg-gray-900 text-white py-2 px-5"
    >Add product</a
    >
</footer>

<x-flash-message />
</body>
</html>
