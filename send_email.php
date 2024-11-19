<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coletando os dados do formulário
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // E-mail de destino
    $to = "rafael.leondeveloper@gmail.com";

    // Assunto e corpo do e-mail
    $email_subject = "Nova mensagem do site: $subject";
    $email_body = "Você recebeu uma nova mensagem.\n\n";
    $email_body .= "Nome: $name\n";
    $email_body .= "E-mail: $email\n\n";
    $email_body .= "Mensagem:\n$message\n";

    // Configurando cabeçalhos para o envio
    $headers = "From: $email\n";
    $headers .= "Reply-To: $email\n";

    // Enviando o e-mail
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "<script>alert('Mensagem enviada com sucesso!'); window.history.back();</script>";
    } else {
        echo "<script>alert('Falha ao enviar a mensagem. Tente novamente.'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Acesso inválido.'); window.history.back();</script>";
}
?>
