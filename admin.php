<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Trị Viên - Hệ Thống Quản Lý Vật Liệu</title>
    <link rel="stylesheet" href="/css/admin.css">
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f9f9f9;
        margin: 0;
        padding: 0;
    }

    header {
        background-color: #333;
        color: white;
        padding: 10px 0;
        text-align: center;
    }

    nav ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
    }

    nav ul li {
        margin: 0 15px;
    }

    nav ul li a {
        color: white;
        text-decoration: none;
        font-weight: bold;
    }

    main {
        margin: 20px;
    }

    .admin-section {
        background-color: white;
        padding: 40px;
        margin-bottom: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .admin-section h2 {
        margin-top: 0;
    }

    label {
        display: block;
        margin: 10px 0 5px;
    }

    input[type="text"],
    input[type="password"],
    input[type="email"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    button:hover {
        background-color: #45a049;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table,
    th,
    td {
        border: 1px solid #ddd;
    }

    th,
    td {
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tbody tr:hover {
        background-color: #f1f1f1;
    }
    </style>
</head>

<body>
    <header>
        <h1>Hệ Thống Quản Lý Vật Liệu - Quản Trị Viên</h1>
        <nav>
            <ul>
                <li><a href="dashboard.php">Bảng Điều Khiển</a></li>
                <li><a href="admin.php">Quản Lý Tài Khoản</a></li>
                <li><a href="logout.php">Đăng Xuất</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="admin-section">
            <h2>Tạo Tài Khoản Người Dùng</h2>
            <form action="create_account.php" method="POST">
                <label for="username">Tên Đăng Nhập:</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Mật Khẩu:</label>
                <input type="password" id="password" name="password" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <button type="submit">Tạo Tài Khoản</button>
            </form>
        </section>
        <section class="admin-section">
            <h2>Danh Sách Tài Khoản</h2>
            <table>
                <thead>
                    <tr>
                        <th>Tên Đăng Nhập</th>
                        <th>Mật khẩu</th>
                        <th>Email</th>
                        <th>Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'config.php';
                    $sql = "SELECT username, email , password FROM users";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['username']}</td>
                                    <td>{$row['password']}</td>
                                    <td>{$row['email']}</td>
                                    <td><button onclick=\"deleteUser('{$row['username']}')\">Xóa</button></td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>Không có tài khoản nào</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </main>
    <script>
    function deleteUser(username) {
        if (confirm("Bạn có chắc chắn muốn xóa tài khoản này?")) {
            window.location.href = "delete_user.php?username=" + username;
        }
    }
    </script>
</body>

</html>