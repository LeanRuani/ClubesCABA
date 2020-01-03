
<!DOCTYPE html>
<html>
<head>
    <title>Ayuda</title>
    <script type="text/javascript" src= "js/jquery.js"></script>
    <link rel="shortcut icon" href="img/icono.ico" type="image/ico"/>
    <script type="text/javascript">
        $(function(){
          $(".accordion-titulo").click(function(e){
                   
                e.preventDefault();
            
                var contenido=$(this).next(".accordion-content");

                if(contenido.css("display")=="none"){ //open        
                  contenido.slideDown(250);         
                  $(this).addClass("open");
                }
                else{ //close       
                  contenido.slideUp(250);
                  $(this).removeClass("open");  
                }
            });
        });</script>
    <link rel="stylesheet" type="text/css" href="css/estilos3.css">
</head>
<body>
<div id="container-main">

<h1>Necesitas Ayuda?</h1>

    <div class="accordion-container">
    <a href="" class="accordion-titulo">Preguntas Frecuentes<span class="toggle-icon"></span></a>
        <div class="accordion-content">
            <div class="p">
                <h3>¿Que es esto?</h3>
                <p>Esta es una pagina web donde podras encontrar todos los Clubes de la Ciudad de Buenos Aires que mas te convengan, ya sea por tu ubicacion o por la actividad que desees. Te mostrara toda la informacion que necesites y mas.</p>
            </div>
            <div class="p">
                <h3>¿Como se busca?</h3>
                <p>Hay dos formas de busqueda. La primera es a traves del el nombre del club, en la barra principal, y la segunda es la busqueda mas avanzada (que es accesible cuando accedes al boton "Busqueda Avanzada"). Alli encontraras dos selectores que filtran por Barrios y por Actividades.</p>
            </div>
            <div class="p">
                <h3>¿Quienes somos?</h3>
                <p>Somos un grupo de desarrollo de la <a href="http://www.msthompson.edu.ar/mst/index.html">Escuela Tecnica Nro 3 Maria Sanchez de Thompson</a>.</p>
            </div>
            <div class="p">
                <h3>¿Como se si mi Club se encuetra en la pagina?</h3>
                <p>Es cuestion de buscarlo. Quizas puedas encontrar otros clubes mejores del que buscas.</p>
            </div>
            <div class="p">
                <h3>¿En el futuro se agregaran mas clubes?</h3>
                <p>Constantemente se agregan a nuestro sistema. La idea es avanzar hacia otras provincias en un futuro.</p>
            </div>
            <div class="p">
                <h3>¿Puedo agregar un club que no este?</h3>
                <p>Si, pero no cualquier usuario. Para estar en la pagina deberan cominicarse con nosotros los responsables del establecimiento para verificar detalles que necesitamos. ayuda_clubes@clubescaba.com</p>
            </div>
        </div>
    </div>

    <div class="accordion-container">
        <a href="" class="accordion-titulo">Problemas<span class="toggle-icon"></span></a>
        <div class="accordion-content">
            <div class="p">
                <h3>Velocidad de Internet</h3>
                <p>La calidad de la conexión a Internet de tu casa puede afectar en gran medida a la busqueda. Necesitas una conexión a Internet con una velocidad de descarga de 100 Kbps como mínimo.</p>
            </div>
            <div class="p">
                <h3>¿Tarda en cargar?</h3>
                <p>Si borras las cookies y la caché del navegador, se eliminará la configuración de los sitios web (como los nombres de usuario y las contraseñas), lo que puede provocar que algunos de ellos funcionen más lentamente debido a que tienen que volver a cargar todas las imágenes.</p>
            </div>
            <div class="p">
                <h3>¿No se ve de manera correcta?</h3>
                <p>Si las páginas web no se muestran correctamente, puedes probar a utilizar el modo "navegación privada" o incógnito de tu navegador para comprobar si el problema se debe a otra causa que no esté relacionada con la caché o las cookies.</p>
            </div>
            <div class="p">
                <h3>¿Problemas con JavaScript?</h3>
                <p>Si recibes un mensaje de error indicando que JavaScript está desactivado necesitas la última versión y debes instalar la última versión de Adobe Flash Player.</p>
            </div>
        </div>
    </div>
    
    <div class="accordion-container">
        <a href="" class="accordion-titulo"> Mas Ayuda? <span class="toggle-icon"></span></a>
        <div class="accordion-content">
            <p>Necesitas mas ayuda? Podes contactarte con nosotros via e-mail a ayuda_clubes@clubescaba.com</p>
        </div>
    </div>
</div>
</body>
</html>