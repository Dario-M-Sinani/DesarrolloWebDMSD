
<?php
include 'conexion.php'; // Incluye la conexión con mysqli

// Verificar si el parámetro 'prompt' está presente
if (isset($_GET['prompt'])) {
    $prompt = $_GET['prompt'];

    // Realizar la consulta en la base de datos para buscar libros que coincidan con el término
    $query = "SELECT * FROM libros WHERE titulo LIKE ?";
    $stmt = $con->prepare($query);
    $searchTerm = "%$prompt%";
    $stmt->bind_param('s', $searchTerm);
    $stmt->execute();
    
    $result = $stmt->get_result();
    $books = [];

    while ($book = $result->fetch_assoc()) {
        $books[] = $book;
    }

    echo json_encode($books);

} else {
    echo json_encode([]); // Si no hay parámetro 'prompt', devolver un arreglo vacío
}
?>

<div class="searchbar">
    <input type="text" name="prompt" id="searchbar" placeholder="Buscar libro..." />
    <div class="results"></div>
</div>

<!-- Modal para mostrar los detalles del libro -->
<div id="bookDetails" style="display: none;">
    <h2 id="bookTitle"></h2>
    <img id="bookImage" src="" alt="Imagen del libro" style="max-width: 200px;" />
    <p><strong>Autor:</strong> <span id="bookAuthor"></span></p>
</div>

<script>
// Función para realizar la búsqueda de libros
document.getElementById('searchbar').addEventListener('input', function() {
    const prompt = this.value;

    // Si el prompt no está vacío
    if (prompt.trim()) {
        fetch(`search.php?prompt=${encodeURIComponent(prompt)}`)
            .then(response => response.json())
            .then(data => {
                const resultsDiv = document.querySelector('.results');
                resultsDiv.innerHTML = ''; // Limpiar resultados anteriores

                data.forEach(book => {
                    const bookDiv = document.createElement('div');
                    bookDiv.classList.add('result');
                    bookDiv.textContent = book.titulo;
                    bookDiv.addEventListener('click', function() {
                        showBookDetails(book);
                    });
                    resultsDiv.appendChild(bookDiv);
                });
            })
            .catch(error => console.error('Error:', error));
    }
});

// Función para mostrar los detalles del libro seleccionado
function showBookDetails(book) {
    document.getElementById('bookTitle').textContent = book.titulo;
    document.getElementById('bookImage').src = book.imagen; // Asume que la columna 'imagen' contiene la URL de la imagen
    document.getElementById('bookAuthor').textContent = book.autor;

    document.getElementById('bookDetails').style.display = 'block';
}
</script>
