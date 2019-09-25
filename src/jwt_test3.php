<?php

    require_once '../vendor/autoload.php';

    use Lcobucci\JWT\Builder;
    use Lcobucci\JWT\Signer\Key;
    use Lcobucci\JWT\Signer\Hmac\Sha256;

    $jwt_signer = new Sha256;
    $jwt_secret = "Batemam&Robson";

    $time = time();

    $jwt_token = (new Builder())
        ->withClaim("user_id", 123)
        ->withClaim("user_name", "Joao Silva")
        ->withClaim("user_email", "teste@gmail.com")
        ->issuedAt($time)
        ->expiresAt($time + 3600)
        ->getToken($jwt_signer, new Key($jwt_secret));

    echo("<h3>Token</h3><h4>".$jwt_token."</h4>");
    echo("<br><h3>Token Headers</h3><h4>".json_encode($jwt_token->getHeaders())."</h4>");
    echo("<br><h3>Token Claims</h3><h4>".json_encode($jwt_token->getClaims())."</h4>");
    echo("<br><h3>Token Verify (Correct key)</h3><h4>".json_encode($jwt_token->verify($jwt_signer, $jwt_secret))."</h4>");
    echo("<br><h3>Token Verify (Wrong key)</h3><h4>".json_encode($jwt_token->verify($jwt_signer, "BatmanAndRobin"))."</h4>");

    echo("<br>Repo-link: <a href='https://github.com/HenriqueMitsuo/PHP_jwt_testing/blob/master/src/jwt_test3.php'>https://github.com/HenriqueMitsuo/PHP_jwt_testing/blob/master/src/jwt_test3.php</a>");
?>