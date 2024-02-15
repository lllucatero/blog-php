<?php

namespace system\Core;

class Helpers
{
/**
 * 
 * @param string $texto Texto que vai ser resumido
 * @param int $limite Quantidade máxima de caracteres do resumo
 * @param string $continue Opcional - String a ser adicionada no final do resumo
 * @return string Texto final resumido
 * 
 */

 public static function resumirTexto(string $texto, int $limite, string $continue = '...'): string
 {
     $textoLimpo = trim(strip_tags($texto));
     if (mb_strlen($textoLimpo) <= $limite){
         return $textoLimpo;
     }
 
     $textoResumido = mb_substr($textoLimpo, 0, mb_strrpos
     (mb_substr($textoLimpo, 0, $limite), ''));
 
     return $textoResumido.$continue;
 }

 public static function slug($text)
 {
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);

    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    $text = preg_replace('~[^-\w]+~', '', $text);
    
    $text = trim($text, '-');
    
    $text = strtolower($text);

    return $text;
}

// function slug($string){
//     return strtolower(trim(preg_replace('~[^0-9a-z]+~i', '-', html_entity_decode(preg_replace
//     ('~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i', '$1',
//     htmlentities($string, ENT_QUOTES, 'UTF-8')), ENT_QUOTES, 'UTF-8')), '-'));
// }


public static function validaCPF($cpf) 
{
    // Extrai somente os números
    $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
    
    // Verifica se foi informado todos os digitos corretamente
    if (strlen($cpf) != 11) {
        return false;
    }
    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }
    // Faz o calculo para validar o CPF
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
        }
    }
    return true;
}

public static function saudacao(string $hora): string
{
    $hora = match(true){
        $hora >= 5 && $hora <= 11 => 'Bom dia',
        $hora >= 12 && $hora <= 17 => 'Boa tarde',
        $hora >= 18 && $hora <= 23 => 'Boa noite',
        default => 'Boa madrugada'
    };

    return $hora;
}

public static function localhost(): bool
{
    $server = $_SERVER['SERVER_NAME'];
    if($server == 'localhost'){
       return true;
    }
    return false;
}

public static function url(string $url): string
{
    $server = $_SERVER['SERVER_NAME'];
    $env = ($server == 'localhost' ? URL_DEV : URL_PROD);

    if(str_starts_with($url, '/'))
    {
        return $env.$url;
    }

    return $env.'/'.$url;
}

public static function formatarValor(float $number = null): string
{
    return number_format($number ?: 0, 2, ',','.');
}

public static function validarUrl(string $url): bool
{
    return filter_var($url, FILTER_VALIDATE_URL);
}

public static function validarEmail(string $email): bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

}

// function contarTempo(string $data): string
// {
//     $agora = strtotime(date('Y-m-d H:i:s'));
//     $tempo = strtotime($data);
//     $diferenca = ($agora - $tempo);
    
//     $segundos = $diferenca;
//     $minutos = round($diferenca / 60);
//     $horas = round($minutos / 60);
//     $dias = round($horas / 24);
//     $meses = round($dias / 30);
//     $anos = round($meses /12);

//     if($segundos <= 60){
//         return 'Agora';
//     }elseif($minutos < 60){
//         return $minutos == 1 ? 'Há 1 minuto' : 'Há '.$minutos. ' minutos';
//     }elseif($horas < 24){
//         return $horas == 1 ? 'Há 1 hora' : 'Há '.$horas. ' horas';
//     }elseif($dias < 30){
//         return $dias == 1 ? 'Há 1 dia' : 'Há ' .$dias. ' dias';
//     }elseif($meses < 12){
//         return $meses == 1 ? 'Há um mês' : 'Há ' .$meses. ' meses';
//     }
//     else return $anos == 1 ? 'Há um ano' : 'Há ' .$anos. ' anos';
// }