<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Free Time</title>
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/styles.css') }}" >
</head>
<body>

    @include('frontend.layouts.header')

    @yield('home')

    @include('frontend.layouts.footer')

    <script type="text/javascript" src="{{ asset('frontend/assets/js/index.bundle.js') }}"></script>
    <script>
        const tabGroups = document.querySelectorAll('.tab-group');

        tabGroups.forEach((group) => {
            const tabs = group.querySelectorAll('.tab');
            const contentGroup = document.getElementById(`content${group.id.substr(-1)}`);
            const contents = contentGroup.querySelectorAll('.content');

            tabs.forEach((tab, index) => {
                tab.addEventListener('click', () => {
                    // Elimina la clase 'active' de todas las pestañas en el grupo
                    tabs.forEach((t) => t.classList.remove('active'));
                    // Establece la clase 'active' solo en la pestaña clickeada
                    tab.classList.add('active');

                    // Oculta todos los contenidos del grupo
                    contents.forEach((content) => content.style.display = 'none');
                    // Muestra el contenido correspondiente a la pestaña activa
                    contents[index].style.display = 'block';
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Captura el evento de cambio en el campo de búsqueda
            $('#blog-search-box').on('input', function() {
                var searchText = $(this).val().toLowerCase();
                var $menuItems = $(this).closest('.dropdown-menu').find('.dropdown-item');
                var $noResultsMessage = $(this).closest('.dropdown-menu').find('.blog-no-results');

                // Oculta el mensaje "No se encontraron resultados" al escribir
                $noResultsMessage.hide();

                // Filtra los elementos del menú desplegable
                var resultsFound = false;
                $menuItems.each(function() {
                    var itemText = $(this).text().toLowerCase();
                    if (itemText.indexOf(searchText) === -1) {
                        $(this).hide();
                    } else {
                        $(this).show();
                        resultsFound = true;
                    }
                });

                // Muestra el mensaje "No se encontraron resultados" si no se encontraron coincidencias
                if (!resultsFound) {
                    $noResultsMessage.show();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Captura el evento de cambio en el campo de búsqueda
            $('#library-search-box').on('input', function() {
                var searchText = $(this).val().toLowerCase();
                var $menuItems = $(this).closest('.dropdown-menu').find('.dropdown-item');
                var $noResultsMessage = $(this).closest('.dropdown-menu').find('.no-results');

                // Oculta el mensaje "No se encontraron resultados" al escribir
                $noResultsMessage.hide();

                // Filtra los elementos del menú desplegable
                var resultsFound = false;
                $menuItems.each(function() {
                    var itemText = $(this).text().toLowerCase();
                    if (itemText.indexOf(searchText) === -1) {
                        $(this).hide();
                    } else {
                        $(this).show();
                        resultsFound = true;
                    }
                });

                // Muestra el mensaje "No se encontraron resultados" si no se encontraron coincidencias
                if (!resultsFound) {
                    $noResultsMessage.show();
                }
            });
        });
    </script>

</body>
</html>
