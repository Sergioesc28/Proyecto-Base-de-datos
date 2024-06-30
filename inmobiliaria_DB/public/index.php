<?php
// Incluir el archivo de conexión
include 'conexion.php';

// Función para mostrar todos los clientes
function mostrarClientes() {
    global $conn;
    $sql = "SELECT * FROM cliente";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Listado de Clientes</h2>";
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Nombres</th><th>Apellidos</th><th>Teléfono</th><th>Correo Electrónico</th><th>Dirección</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["idCliente"]."</td>";
            echo "<td>".$row["nombres"]."</td>";
            echo "<td>".$row["apellidos"]."</td>";
            echo "<td>".$row["telefonoCasa"]." / ".$row["telefonoCelular"]."</td>";
            echo "<td>".$row["correoElectronico"]."</td>";
            echo "<td>".$row["direccion"]."</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No se encontraron clientes.";
    }
}

// Verificar el tipo de solicitud (si se ha enviado un formulario, etc.)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ejemplo: si se envió un formulario para agregar un cliente
    if (isset($_POST["agregarCliente"])) {
        // Recoger los datos del formulario
        $nombres = $_POST["nombres"];
        $apellidos = $_POST["apellidos"];
        $telefonoCasa = $_POST["telefonoCasa"];
        $telefonoCelular = $_POST["telefonoCelular"];
        $correoElectronico = $_POST["correoElectronico"];
        $direccion = $_POST["direccion"];

        // Preparar la consulta SQL para insertar un nuevo cliente
        $sql = "INSERT INTO cliente (nombres, apellidos, telefonoCasa, telefonoCelular, correoElectronico, direccion) 
                VALUES ('$nombres', '$apellidos', '$telefonoCasa', '$telefonoCelular', '$correoElectronico', '$direccion')";

        // Ejecutar la consulta
        if ($conn->query($sql) === TRUE) {
            echo "Cliente agregado correctamente.";
        } else {
            echo "Error al agregar cliente: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Metadatos y enlaces de estilo -->
</head>
<body>
    <!-- Tu contenido HTML existente -->
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenido a MasInmobiliaria</title>
  <link rel="stylesheet" href="output.css">
  <link rel="shortcut icon" href="images/casa.png">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col min-h-screen">

  <!-- Header -->
  <header class="w-full bg-gray-100">
    <div class="container mx-auto flex justify-between items-center py-2">
      <img src="images/icocasa.webp" alt="Logo de la Inmobiliaria" class="w-10 h-auto">
      <h1 class="text-3xl font-serif"><span class="text-blue-600">Mas</span>Inmobiliaria</h1>
      
      <div class="block lg:hidden">
        <button id="nav-toggle" class="focus:outline-none">
          <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>
      </div>
      
      <nav id="nav-content" class="hidden lg:flex lg:flex-1 text-lg">
        <ul class="flex justify-center space-x-10">
        <li><a href="propiedades.html" class="text hover:shadow-xl text-black font-serif">Propiedades</a></li>
          <li><a href="clientes.html" class="text hover:shadow-xl text-black font-serif">Clientes</a></li>
          <li><a href="empleados.html" class="text hover:shadow-xl text-black font-serif">Empleados</a></li>
          <li><a href="reportes.html" class="text hover:shadow-xl text-black font-serif">Reportes</a></li>
        </ul>
      </nav>
      
      <nav id="nav-content-secondary" class="hidden lg:flex">
        <ul class="flex space-x-4 justify-center text-lg">
          <li><a href="registro.html" class="text hover:shadow-xl text-black font-serif">Registro</a></li>
          <li><a href="login.html" class="px-4 py-2 rounded-3xl bg-black text-white hover:bg-blue-600 font-serif">Iniciar sesión</a></li>
        </ul>
      </nav>
    </div>
    
    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden lg:hidden">
      <nav class="bg-gray-100 p-4">
        <ul>
          <li><a href="propiedades.html" class="block py-2">Propiedades</a></li>
          <li><a href="clientes.html" class="block py-2">Clientes</a></li>
          <li><a href="empleados.html" class="block py-2">Empleados</a></li>
          <li><a href="reportes.html" class="block py-2">Reportes</a></li>
          <li><a href="registro.html" class="block py-2">Registro</a></li>
          <li><a href="login.html" class="block py-2">Iniciar sesión</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <div class="relative bg-cover bg-center h-screen flex items-center justify-center" style="background-image: url('https://imgs.search.brave.com/YDz1yx6whROVyW2iYxV19wRc6JoiJPwKnt7f4E7p8fY/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pbWFn/ZXMuaG9taWZ5LmNv/bS92MTQ0MDc1NjY5/OS9wL3Bob3RvL2lt/YWdlLzY2MzY4Ni9C/eV9uaWdodC5qcGc');">
    <div class="absolute inset-0 flex items-center justify-center">
      <div class="bg-black opacity-75 rounded-lg p-8 text-white text-center">
        <h1 class="text-5xl font-bold mb-4 whitespace-normal">Bienvenido a MasInmobiliaria</h1>
        <p class="text-lg">Tu socio en la gestión de propiedades inmobiliarias.</p>
      </div>
    </div>
  </div>
 <!-- Después del banner de bienvenida -->
<div class="container mx-auto mt-8">
  <h2 class="text-3xl font-bold text-center mb-8">Propiedades Disponibles</h2>

  <div class="grid grid-cols-3 gap-4">
    <!-- Tarjeta 1 -->
    <div class="max-w-sm rounded overflow-hidden shadow-lg mb-4">
      <img class="w-full h-64 object-cover" src="https://img.lamudi.com.mx/eyJidWNrZXQiOiJwcmQtbGlmdWxsY29ubmVjdC1iYWNrZW5kLWIyYi1pbWFnZXMiLCJrZXkiOiJwcm9wZXJ0aWVzLzc0ZDMyZDQxLWE2OGItNGQzMy04MTQ3LWU3ZGI4NmRiZTEyZi83N2JhYzExMy0yZWI2LTQ2ZjMtODQzOC0wMzE4N2Q4YWVhY2QuanBnIiwiYnJhbmQiOiJMQU1VREkiLCJlZGl0cyI6eyJyZXNpemUiOnsid2lkdGgiOjkwMCwiaGVpZ2h0Ijo2NTAsImZpdCI6ImNvdmVyIn19fQ==" alt="Nombre de la propiedad 1">
      <div class="px-6 py-4">
        <div class="font-bold text-xl mb-2">Casa Norte de Mérida, Privada en Cholul</div>
        <p class="text-gray-700 text-base">
          Casa en Privada en Cholul, piscina propia, 3 recámaras, 2.5 baños, 2 plantas, 175 m2 de construcción, 369 m2 de terreno. Medidas 9x41 m. Estacionamiento para 4 autos techado, terraza, balcón al frente y atrás, sala, comedor, cocina, cuarto de lavado, cisterna.
        </p>
      </div>
      <div class="px-6 pt-4 pb-2">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mr-2">
          Proceder con el pago
        </button>
        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">
          Contactar al vendedor
        </button>
      </div>
    </div>

    <!-- Tarjeta 3 -->
    <div class="max-w-sm rounded overflow-hidden shadow-lg mb-4">
      <img class="w-full h-64 object-cover" src="https://img.lamudi.com.mx/eyJidWNrZXQiOiJwcmQtbGlmdWxsY29ubmVjdC1iYWNrZW5kLWIyYi1pbWFnZXMiLCJrZXkiOiJwcm9wZXJ0aWVzL2U5NzgwNjAzLTkxOTYtNDhhMC05YTBiLTE1MjVlYzQ4NWNmZS8yM2VlZTU4YS05NWFlLTQ5ZWQtYTdiOC01ZmIxODNjNzZmYjgucG5nIiwiYnJhbmQiOiJMQU1VREkiLCJlZGl0cyI6eyJyZXNpemUiOnsid2lkdGgiOjkwMCwiaGVpZ2h0Ijo2NTAsImZpdCI6ImNvdmVyIn19fQ==" alt="Nombre de la propiedad 2">
      <div class="px-6 py-4">
        <div class="font-bold text-xl mb-2">Casa en Real Montejo Mérida Yucatán.</div>
        <p class="text-gray-700 text-base">
          ¡¡ Precio $ 1,906,400.00 MXN !! Es un inmueble de RECUPERACIÓN BANCARIA o HIPOTECARIA. Calle 51 B Real Montejo Mérida Yucatán ¡No créditos! ¡ No Infonavit ! ¡ SOLO CONTADO ! ¡ Comienza tu trámite con $ 450,000.00 MN ! NUESTRO TRABAJO NO ES VENDER, SI NO QUE VUELVAN A COMPRAR. Costos muy accesibles, que van de un 20-60% debajo del valor de mercado
        </p>
      </div>
      <div class="px-6 pt-4 pb-2">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mr-2">
        Proceder con el pago
        </button>
        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">
          Contactar al vendedor
        </button>
      </div>
    </div>
    <div class="max-w-sm rounded overflow-hidden shadow-lg mb-4">
      <img class="w-full h-64 object-cover" src="https://img.lamudi.com.mx/eyJidWNrZXQiOiJwcmQtbGlmdWxsY29ubmVjdC1iYWNrZW5kLWIyYi1pbWFnZXMiLCJrZXkiOiJwcm9wZXJ0aWVzL2ZkNzU1MjYzLTU4YjUtNGMyNC1hZDk1LTYzYjE2Zjk2M2IwZi8yZjZmOGI0NS04NjFmLTQ4NTItYjg5ZS0wOTlmYmI3MWE5YjMucG5nIiwiYnJhbmQiOiJMQU1VREkiLCJlZGl0cyI6eyJyZXNpemUiOnsid2lkdGgiOjkwMCwiaGVpZ2h0Ijo2NTAsImZpdCI6ImNvdmVyIn19fQ==" alt="Nombre de la propiedad 1">
      <div class="px-6 py-4">
        <div class="font-bold text-xl mb-2">CASA MERIDA NORTE</div>
        <p class="text-gray-700 text-base">
          Aquí está su oportunidad de comprar una casa totalmente remodelada en la zona más deseable de Mérida, la ciudad más segura de México. Esta casa fue construida en el 2006 o después de acuerdo a los planos arquitectónicos, en dos plantas, con 4 recámaras, 6 baños, oficina casita, alberca y bar húmedo. Ubicada en Calle 15 con 20B, es la primera casa junto a Italian Coffee Company
        </p>
      </div>
      <div class="px-6 pt-4 pb-2">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mr-2">
        Proceder con el pago
        </button>
        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">
          Contactar al vendedor
        </button>
      </div>
    </div>
  </div>
</div>


  <!-- Footer -->
  <footer class="bg-gray-800 text-white p-4">
    <div class="container mx-auto px-4">
      <div class="flex flex-col md:flex-row justify-between items-center">
        <div class="mb-6 md:mb-0">
          <h4 class="text-lg font-bold">MasControl Inmobiliaria</h4>
          <p class="text-sm">© 2024 Todos los derechos reservados.</p>
        </div>
        <div class="flex space-x-4 mb-6 md:mb-0">
          <a href="#" class="hover:text-gray-400">¿Dónde encontrarnos?</a>
          <a href="#" class="hover:text-gray-400">Contacto</a>
          <a href="#" class="hover:text-gray-400">Servicios</a>
          <a href="#" class="hover:text-gray-400">Noticias</a>
        </div>
        <div class="flex space-x-4">
          <a href="https://www.facebook.com/" class="hover:text-gray-400">
            <img src="../output/images/facebook.png" class="h-6 w-6">
          </a>
          <a href="https://x.com/?lang=es&mx=2" class="hover:text-gray-400">
            <img src="../output/images/twitter.png" class="h-6 w-6">
          </a>
          <a href="https://www.instagram.com/" class="hover:text-gray-400">
            <img src="../output/images/instagram.png" class="h-6 w-6">
          </a>
        </div>
      </div>
    </div>
  </footer>

  <script src="script.js"></script> <!-- Enlace al archivo JavaScript externo -->
</body>
</html>
 <!-- Formulario para agregar un cliente -->
    <div class="container mx-auto mt-8">
        <h2 class="text-3xl font-bold text-center mb-8">Agregar Cliente</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="nombres">Nombres:</label>
            <input type="text" id="nombres" name="nombres" required><br><br>
            <label for="apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" required><br><br>
            <label for="telefonoCasa">Teléfono Casa:</label>
            <input type="text" id="telefonoCasa" name="telefonoCasa"><br><br>
            <label for="telefonoCelular">Teléfono Celular:</label>
            <input type="text" id="telefonoCelular" name="telefonoCelular"><br><br>
            <label for="correoElectronico">Correo Electrónico:</label>
            <input type="email" id="correoElectronico" name="correoElectronico" required><br><br>
            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" required><br><br>
            <input type="submit" name="agregarCliente" value="Agregar Cliente">
        </form>
    </div>

    <!-- Mostrar listado de clientes -->
    <div class="container mx-auto mt-8">
        <?php mostrarClientes(); ?>
    </div>
</body>
</html>
