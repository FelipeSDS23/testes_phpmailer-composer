<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envio de Email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .email-form-container {
            background: #ffffff;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        .email-form-container h2 {
            margin-bottom: 15px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background: #f9f9f9;
        }

        .form-group textarea {
            resize: none;
            height: 100px;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #007bff;
            background: #ffffff;
            outline: none;
        }

        .form-group button {
            display: block;
            width: 100%;
            padding: 10px;
            font-size: 16px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .form-group button:hover {
            background: #0056b3;
        }

        .message {
            text-align: center;
            padding: 10px;
            border-radius: 5px;
            color: #fff;
        }

        .sucess {
            background-color: #198754;
        }

        .error {
            background-color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="email-form-container">
        <?php
            // Mostra mensagem de retorno
            if(isset($_GET['returnMsg']) && isset($_GET['status'])) {
                $msg = $_GET['returnMsg'];
                $status = $_GET['status'];

                // Define a cor de fundo da mensagem com base no tipo retorno
                if($msg == "sucess") {
                    echo "<div class='message $status' id='message'>$msg</div>";
                } else {
                    echo "<div class='message $status' id='message'>$msg</div>";
                }
                
            }
        ?>
        <h2>Envio de Email</h2>
        <form action="processa_email.php" method="POST">
            <div class="form-group">
                <label for="from">De (From):</label>
                <input type="email" id="from" name="from" placeholder="Seu email" required>
            </div>
            <div class="form-group">
                <label for="to">Para (To):</label>
                <input type="email" id="to" name="to" placeholder="Destinatário" required>
            </div>
            <div class="form-group">
                <label for="subject">Assunto (Subject):</label>
                <input type="text" id="subject" name="subject" placeholder="Assunto do email" required>
            </div>
            <div class="form-group">
                <label for="message">Mensagem (Message):</label>
                <textarea id="message" name="message" placeholder="Escreva sua mensagem aqui..." required></textarea>
            </div>
            <div class="form-group">
                <button type="submit">Enviar Email</button>
            </div>
        </form>
    </div>

    <script>
        const message = document.querySelector('#message');

        // Esconde mensagem de retorno após 5 segundos
        window.addEventListener('load', () => {
            if (window.getComputedStyle(message).display === 'block') {
                setTimeout(() => {
                    message.style.display = 'none';
                }, 5000);
            }
        });
    </script>
</body>
</html>
