<?php

function media(): string
{
    return BASE_URL . 'Frontend/';
}

function base_url(): string
{
    return BASE_URL;
}

function base_url_frontend(): string
{
    return BASE_URL . 'Frontend/';
}

function response(string $status, $data = null, string $message = ''): void
{
    echo json_encode([
        'status'  => $status,
        'message' => $message,
        'data'    => $data
    ]);
    exit;
}

function clean(string $value): string
{
    return htmlspecialchars(strip_tags(trim($value)));
}

function hashPassword(string $password): string
{
    return password_hash($password, PASSWORD_BCRYPT);
}

function verifyPassword(string $password, string $hash): bool
{
    return password_verify($password, $hash);
}

function getJsonBody(): array
{
    $body = file_get_contents('php://input');
    return json_decode($body, true) ?? [];
}

function headerAdmin($data = "")
{
    require_once(__DIR__ . "/../../Frontend/Views/Template/header_admin.php");
}

function footerAdmin($data = "")
{
    require_once(__DIR__ . "/../../Frontend/Views/Template/footer_admin.php");
}

function getModal(string $modal, $data = ""): void
{
    $modalFile = __DIR__ . "/../../Frontend/Views/Template/Modals/{$modal}.php";
    if (file_exists($modalFile)) {
        require_once($modalFile);
    }
}
