<?php
class Texto
{
    public static function montarLista(array $itens_tabela)
    {
        $quantidade = count($itens_tabela);
        $maximo = ($quantidade*2)+1;
        $itens  = array();
        for($i = 0 ; $i < $quantidade ;$i++)
        {
            $itens[] = self::removerAcentos($itens_tabela[$i]);
        }
        $j = self::contagem($itens);
        $adv = ($quantidade%10)+10;
        $j += $adv;
        $t = 0;
        for($i = 0 ; $i < $maximo ; $i++)
        {
            if($i%2==0)
            {
                $barra="=";
                while(strlen($barra) < $j)
                {
                    $barra.="=";
                }
                print $barra."\n";
            }
            else
            {
                $l = "[ ".($t+1)." -> ".$itens_tabela[$t];
                $ad = self::contarAcentos($itens_tabela[$t]);
                while(strlen($l) < $j+$ad-1)
                {
                    $l .= " ";
                }
                $l .= "]";
                print $l."\n";
                $t++;
            }
        }
    }
    public static function contarAcentos(string $texto) :int
    {
        $acentos = array(
            'Á', 'À', 'Â', 'Ã', 'Ä', 'Å',
            'É', 'È', 'Ê', 'Ë',
            'Í', 'Ì', 'Î', 'Ï',
            'Ó', 'Ò', 'Ô', 'Õ', 'Ö',
            'Ú', 'Ù', 'Û', 'Ü',
            'Ç', 'Ñ',
            'á', 'à', 'â', 'ã', 'ä', 'å',
            'é', 'è', 'ê', 'ë',
            'í', 'ì', 'î', 'ï',
            'ó', 'ò', 'ô', 'õ', 'ö',
            'ú', 'ù', 'û', 'ü',
            'ç', 'ñ'
        );

        $ad = 0;
        foreach($acentos as $a)
        {
            for($i = 0;$i<strlen($texto);$i++)
            {
                if($i+2 <= strlen($texto))
                {
                    if(substr($texto,$i,2) == $a)
                    {
                        $ad++;
                    }
                }
            }
        }
        return $ad;
    
    }
    public static function contagem(array $itens_tabela)
    {
        $j = 0;
        foreach($itens_tabela as $item)
        {
            if(strlen($item) > $j)
            {
                $j = strlen($item);
            }
        }
        return $j;
    }
    public static function removerAcentos(string $string)
    {
        $acentos = array(
            'Á' => 'A', 'À' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A',
            'É' => 'E', 'È' => 'E', 'Ê' => 'E', 'Ë' => 'E',
            'Í' => 'I', 'Ì' => 'I', 'Î' => 'I', 'Ï' => 'I',
            'Ó' => 'O', 'Ò' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O',
            'Ú' => 'U', 'Ù' => 'U', 'Û' => 'U', 'Ü' => 'U',
            'Ç' => 'C', 'Ñ' => 'N',
            'á' => 'a', 'à' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a',
            'é' => 'e', 'è' => 'e', 'ê' => 'e', 'ë' => 'e',
            'í' => 'i', 'ì' => 'i', 'î' => 'i', 'ï' => 'i',
            'ó' => 'o', 'ò' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o',
            'ú' => 'u', 'ù' => 'u', 'û' => 'u', 'ü' => 'u',
            'ç' => 'c', 'ñ' => 'n'
        );
    
        return strtr($string, $acentos);
    }
    public static function alinharTopicos(string $topicos,int $j,$preencher)
    {
        $itens[] = self::removerAcentos($topicos);
        $j += 2;
        $l = $topicos;
        $ad = self::contarAcentos($topicos);
        while(strlen($l) < $j+$ad-1)
        {
            $l .= " ";
        }
        $l .= "$preencher";
        return $l;
    }
    public static function alinharTopicosTras(string $topicos,int $j,$preencher)
    {
        $itens[] = self::removerAcentos($topicos);
        $j += 2;
        $l = " ";
        $ad = self::contarAcentos($topicos);
        while((strlen($l)+strlen($topicos)-1) < $j+$ad-1)
        {
            $l .= " ";
        }
        $l .= "$topicos $preencher";
        return $l;
    }
    public static function montarTabelaPrograma(array $itens_tabela)
    {
        $quantidade = count($itens_tabela);
        $maximo = ($quantidade*2)+1;
        $itens  = array();
        for($i = 0 ; $i < $quantidade ;$i++)
        {
            $itens[] = self::removerAcentos($itens_tabela[$i]);
        }
        $j = self::contagem($itens);
        $adv = ($quantidade%10)+10;
        $j += $adv+9;
        $t = 0;
        for($i = 0 ; $i < $maximo ; $i++)
        {
            if($i%2==0)
            {
                $barra="print\"=";
                while(strlen($barra) < $j)
                {
                    $barra.="=";
                }
                $linhas[] = $barra."\\n\";";
            }
            else
            {
                $l = "print\"[ ".($t+1)." -> ".$itens_tabela[$t];
                $ad = self::contarAcentos($itens_tabela[$t]);
                while(strlen($l) < $j+$ad-1)
                {
                    $l .= " ";
                }
                $l .= "]\\n\";";
                $linhas[] = $l;
                $t++;
            }
        }
        return $linhas;
    }
    public static function alinharTopicosArquivo(string $topicos,int $j)
    {
        $itens[] = self::removerAcentos($topicos);
        $j += 2;
        $l = $topicos;
        $ad = self::contarAcentos($topicos);
        while(strlen($l) < $j+$ad-1)
        {
            $l .= " ";
        }
        $l .= ":";
        return $l;
    }
    public static function espacoTab(array $itens)
    {
        $add = 0;
        foreach($itens as $item)
        {
            if(substr($item,(strlen($item)-1),1) == "{")
            {
                $nadl[] = $add;
                $add++;
            }
            else if(substr($item,(strlen($item)-1),1) == "}")
            {
                $add--;
                $nadl[] = $add;
            }
            else
            {
                $nadl[] = $add;
            }
        }
        $novo = array();
        for($i = 0 ;$i < count($itens) ; $i++)
        {
            if($nadl[$i] != 0)
            {
                for($j = 0 ; $j < $nadl[$i] ;$j++)
                {
                    if($j == 0)
                    {
                        $novo[$i] = "\t";
                    }
                    else
                    {
                        $novo[$i] .= "\t";
                    }
                }
                $novo[$i] .= $itens[$i];
            }
            else
            {
                $novo[$i] = $itens[$i];
            }
        }
        return $novo;
    }
    public static function escrevaDevagar(string $mensagem)
    {
        $tamanho = strlen($mensagem);
        for($i = 0 ; $i < $tamanho ; $i++)
        {
            print substr($mensagem,$i,1);
            switch(substr($mensagem,$i,1))
            {
                case '.': usleep(600000) ;break;
                case '?': usleep(600000) ;break;
                case '!': usleep(600000) ;break;
                case ',': usleep(600000) ;break;
                case ';': usleep(700000) ;break;
                default: usleep(40000) ;break;
            }
        }
    }
    public static function montarTabela(array $tabela)
    {
        $chaves = array_keys($tabela[0]);
        $itens = array();
        for($i = 0 ; $i < count($chaves );$i++)
        {
            $itens[$i][] = ucfirst($chaves[$i]);
        }
        foreach($tabela as $t)
        {
            $j = 0;
            foreach($t as $c)
            {
                $itens[$j][] = $c; 
                $j++;
            }
        }
        $nums = array();
        foreach($itens as $i)
        {
            $nums[] = self::contagem($i);
        }
        $linha = "";
        $j = 0;
        foreach($itens as $i)
        {
            $linha .= "| ".self::alinharTopicos($i[0],$nums[$j]," ");
            $j++;
        }
        $l = strlen($linha)+1;
        for($i = 0;$i<$l;$i++)
        {
            print "-";
        }
        print "\n";
        print $linha."|\n";
        for($i = 0;$i<$l;$i++)
        {
            print "-";
        }
        print "\n";

        for($i = 1;$i < count($itens[0]);$i++)
        {
            $c = 0;
            $linha = "";
            for($j = 0;$j < count($itens);$j++)
            {
                $linha .= "| ".self::alinharTopicos($itens[$j][$i],$nums[$c]," ");
                $c++;
            }
            $linha .= "|\n";
            print $linha;
            for($a = 0;$a<$l;$a++)
            {
                print "-";
            }
            print "\n";
        }
    }
}
