require 'mysqli.php';



$servername = "localhost";
$username = "docker";
$password = "123";
$dbname = "docker";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


function getMessages($page, $itemsPerPage) {
    global $conn;
    $start = ($page - 1) * $itemsPerPage;
    $sql = "SELECT id, title, SUBSTRING(content, 1, 100) AS short_content FROM messages LIMIT ?, ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $start, $itemsPerPage);
    $stmt->execute();
    $result = $stmt->get_result();

}

function getMessageWithComments($messageId) {
    global $conn;
    $sql = "SELECT * FROM messages WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $messageId);
    $stmt->execute();
    $messageResult = $stmt->get_result();

    $commentSql = "SELECT * FROM comments WHERE message_id = ?";
    $stmt = $conn->prepare($commentSql);
    $stmt->bind_param("i", $messageId);
    $stmt->execute();
    $commentResult = $stmt->get_result();

}


function addMessage($title, $author, $shortContent, $fullContent) {
    global $conn;
    $sql = "INSERT INTO messages (title, author, content, full_content) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $title, $author, $shortContent, $fullContent);
    $stmt->execute();

}


function editMessage($messageId, $title, $author, $shortContent, $fullContent) {
    global $conn;
    $sql = "UPDATE messages SET title = ?, author = ?, content = ?, full_content = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $title, $author, $shortContent, $fullContent, $messageId);
    $stmt->execute();

}


function addComment($messageId, $commenter, $comment) {
    global $conn;
    $sql = "INSERT INTO comments (message_id, commenter, comment) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iss", $messageId, $commenter, $comment);
    $stmt->execute();

}


$conn->close();
