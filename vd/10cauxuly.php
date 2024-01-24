<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu JSON từ yêu cầu POST
    $postData = file_get_contents("php://input");
    $selectedData = json_decode($postData);

    // Kiểm tra xem có dữ liệu được gửi từ client không
    if (!empty($selectedData)) {
        // Hiển thị các ID và Name mà người dùng đã chọn cho 10 câu hỏi
        for ($i = 1; $i <= 10; $i++) {
            $questionId = 'test' . $i;

            // Kiểm tra xem câu hỏi có được chọn hay không
            $selectedItem = array_filter($selectedData, function ($item) use ($questionId) {
                return $item->id === $questionId;
            });

            // Nếu có câu hỏi được chọn, hiển thị thông tin
            if (!empty($selectedItem)) {
                $selectedItem = reset($selectedItem);
                $id = $selectedItem->id;
                $name = $selectedItem->name;
                echo "ID: $id, Name: $name<br>";
            } else {
                echo "ID: $questionId, Name: (Không có câu trả lời được chọn)<br>";
            }
        }
    } else {
        echo "Không có dữ liệu được gửi từ client.";
    }
}
?>
