<?php
class Locais extends model
{

   
    public function tipo_comercio($id_tipo)
    {
        $sql = "SELECT *,
         (select parceiros.img_parceiro from parceiros where parceiros.id_dados_comercio = dados_comercio.id
          limit 1) as url,(select comercio_tipo.id_tipo from comercio_tipo 
          where comercio_tipo.id_tipo = dados_comercio.id_comercio) as comercio_tipo 
          FROM dados_comercio WHERE id_comercio = :id_tipo";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id_tipo", $id_tipo);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $sql = $sql->fetchAll();
            return $sql;
        }
    }
    public function tipo()
    {
        $sql = "SELECT * FROM comercio_tipo";
        $sql = $this->pdo->query($sql);

        if ($sql->rowCount() > 0) {
            $sql = $sql->fetchAll();
            return $sql;
        }
    }
    public function inserir_tipo($nome_tipo)
    {
        $sql = "INSERT INTO comercio_tipo SET nome_tipo = :nome_tipo";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":nome_tipo", $nome_tipo);
        // $sql->bindValue(":img", $img);
        $sql->execute();
    }
    public function inserir_dados_comercio($id_comercio, $nome, $face, $wts, $insta, $maps, $site)
    {
        $sql = "INSERT INTO dados_comercio SET id_comercio = :id_comercio, nome = :nome, facebook = :facebook, wts = :wts, instagram = :instagram, url_maps = :url_maps, site = :site";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id_comercio", $id_comercio);
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":facebook", $face);
        $sql->bindValue(":wts", $wts);
        $sql->bindValue(":instagram", $insta);
        $sql->bindValue(":url_maps", $maps);
        $sql->bindValue(":site", $site);
        $sql->execute();
    }
    public function inserir_comercio_recebido($id_tipo_comercio, $nome, $face, $wts, $insta, $maps, $site)
    {
        $sql = "INSERT INTO comercio_recebido SET id_tipo_comercio = :id_tipo_comercio, nome = :nome, facebook = :facebook, wts = :wts, instagram = :instagram, url_maps = :url_maps, site = :site";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id_tipo_comercio", $id_tipo_comercio);
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":facebook", $face);
        $sql->bindValue(":wts", $wts);
        $sql->bindValue(":instagram", $insta);
        $sql->bindValue(":url_maps", $maps);
        $sql->bindValue(":site", $site);
        $sql->execute();
    }
    public function atualizar_comercio_recebido($id_tipo_comercio, $nome, $face, $wts, $insta, $maps, $site, $id)
    {
        $sql = "UPDATE comercio_recebido SET id_tipo_comercio = :id_tipo_comercio,
         nome = :nome, facebook = :facebook, wts = :wts, instagram = :instagram,
          url_maps = :url_maps, site = :site WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id_tipo_comercio", $id_tipo_comercio);
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":facebook", $face);
        $sql->bindValue(":wts", $wts);
        $sql->bindValue(":instagram", $insta);
        $sql->bindValue(":url_maps", $maps);
        $sql->bindValue(":site", $site);
        $sql->bindValue(":id", $id);
        $sql->execute();
    }
    public function pegar_comercio_recebido()
    {
        $sql = "SELECT comercio_tipo.*, comercio_recebido.* from comercio_tipo 
        INNER JOIN comercio_recebido ON comercio_tipo.id_tipo = comercio_recebido.id_tipo_comercio";
        $sql = $this->pdo->query($sql);
        if ($sql->rowCount() > 0) {
            $sql = $sql->fetchAll();
            return $sql;
        }
    }
    public function getDadosRecebedos($id)
    {
        $sql = "SELECT comercio_recebido.*, comercio_tipo.id_tipo from 
        comercio_recebido INNER JOIN comercio_tipo ON comercio_recebido.id_tipo_comercio = comercio_tipo.id_tipo WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $sql = $sql->fetch();
            return $sql;
        }
    }
    public function deletar_apos_envio_comercio($id_comercio)
    {
        $sql = "DELETE FROM comercio_recebido where id_tipo_comercio = :id_tipo_comercio";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id_tipo_comercio", $id_comercio);
        $sql->execute();
    }
    public function login($email, $senha)
    {
        $sql = "SELECT id FROM usuarios WHERE email = :email AND senha = :senha ";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", $senha);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $sql = $sql->fetch();
            $id = $sql['id'];
            $token = md5(time() . rand(0, 999));
            $sql = "UPDATE usuarios SET token = :token WHERE id = :id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":token", $token);
            $sql->bindValue(":id", $id);
            $sql->execute();

            $_SESSION['id'] = $token;
            return true;
        } else {
            return false;
        }
    }
    public function getComercio($id_comercio)
    {
        $sql = "SELECT * FROM comercio_tipo WHERE id_tipo = :id_tipo";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id_tipo", $id_comercio);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $sql = $sql->fetch();
            return $sql;
        }
    }
    // public function update_comercio($id_comercio, $nome)
    // {
    //     $sql = "UPDATE comercio_tipo SET nome_tipo = :nome_tipo WHERE id_tipo = :id_tipo";
    //     $sql = $this->pdo->prepare($sql);
    //     $sql->bindValue(":nome_tipo", $nome);
    //     $sql->bindValue(":id_tipo", $id_comercio);
    //     $sql->execute();
    // }


    public function update_comercio($id_comercio, $nome, $img)
    {
        $sql = $this->pdo->prepare("UPDATE comercio_tipo SET nome_tipo = :nome_tipo WHERE id_tipo = :id_tipo");
        $sql->bindValue(":nome_tipo", $nome);
        $sql->bindValue(":id_tipo", $id_comercio);
        $sql->execute();
        if (count($img) > 0) {
            for ($q = 0; $q < count($img['tmp_name']); $q++) {
                $tipo = $img['type'][$q];
                if (in_array($tipo, array('image/jpeg', 'image/png'))) {
                    $tmpname = md5(time() . rand(0, 9999)) . '.png';
                    move_uploaded_file($img['tmp_name'][$q], 'assets/arquivos/' . $tmpname);
                    list($width_orig, $height_orig) = getimagesize('assets/arquivos/' . $tmpname);
                    $ratio = $width_orig / $height_orig;
                    $width = 200;
                    $height = 200;
                    if ($width / $height > $ratio) {
                        $width = $height * $ratio;
                    } else {
                        $height = $width / $ratio;
                    }
                    $img = imagecreatetruecolor($width, $height);

                    if ($tipo == 'image/jpeg') {
                        $origi = imagecreatefromjpeg('assets/arquivos/' . $tmpname);
                    } elseif ($tipo == 'image/png') {
                        $origi = imagecreatefrompng('assets/arquivos/' . $tmpname);
                    }
                    imagealphablending($origi, false);
                    imagesavealpha($origi, true);

                    imagecopyresampled($img, $origi, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
                    // imagejpeg($img, 'assets/arquivos/' . $tmpname, 70);
                    // print_r($origi);
                    // echo "png";
                    // exit;
                    $sql = $this->pdo->prepare("INSERT INTO imagens_come SET id_tipo_comercio = :id_tipo_comercio, img = :img");
                    $sql->bindvalue(":id_tipo_comercio", $id_comercio);
                    $sql->bindvalue(":img", $tmpname);
                    $sql->execute();
                }
            }
        }
    }

    public function excluirFoto($id)
    {
        $id_tipo_comercio = 0;
        $sql = $this->pdo->prepare("SELECT id_tipo_comercio FROM imagens_come WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $row = $sql->fetch();
             $id_tipo_comercio = $row['id_tipo_comercio'];
        }
        $sql = $this->pdo->prepare("DELETE FROM imagens_come WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
        return $id_tipo_comercio;
    }

    public function deleteTipoComercio($id_comercio)
    {
        $sql = "DELETE FROM comercio_tipo WHERE id_tipo = :id_tipo";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id_tipo", $id_comercio);
        $sql->execute();
    }
    public function getAnuncio($id_comercio)
    {
        $array = array();
        $sql = "SELECT *,(select comercio_tipo.nome_tipo from comercio_tipo where comercio_tipo.id_tipo = imagens_come.id_tipo_comercio) 
        as cat FROM imagens_come WHERE id_tipo_comercio = id_tipo_comercio";
        // $sql = "SELECT anuncios.*, categorias.categ from anuncios INNER JOIN categorias ON anuncios.id_categoria = categorias.id"; 
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id_tipo_comercio", $id_comercio);
        $sql->execute();
        // echo $id;
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
            $array['img'] = array();
            $sql = "SELECT id,img FROM imagens_come WHERE id_tipo_comercio = :id_tipo_comercio";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":id_tipo_comercio", $id_comercio);
            $sql->execute();
            if ($sql->rowCount() > 0) {
                $array['img'] = $sql->fetchAll();
            }
        }
        return $array;
    }
    public function pegar_dados_comercio($id_tipo)
    {
        $sql = array();
        $sql = "SELECT comercio_tipo.*, dados_comercio.* from comercio_tipo 
        INNER JOIN dados_comercio ON comercio_tipo.id_tipo = dados_comercio.id_comercio WHERE id_tipo = :id_tipo";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id_tipo", $id_tipo);
        $sql->execute();
        if ($sql->rowCount() > 0) {

            $sql = $sql->fetchAll();

            return $sql;
        } else {
            return array();
        }
        // SELECT comercio_tipo.*, dados_comercio.*, parceiros.* from comercio_tipo 
        // INNER JOIN dados_comercio ON comercio_tipo.id_tipo = dados_comercio.id_comercio
        // INNER JOIN parceiros ON parceiros.id_dados_comercio = dados_comercio.id WHERE id_tipo = id_tipo


    }
    
    public function getUsuarios()
    {
        $sql = "SELECT * FROM usuarios";
        $sql = $this->pdo->query($sql);

        if ($sql->rowCount() > 0) {
            $sql = $sql->fetchAll();
            return $sql;
        }
    }
    public function getDadosComercio($id)
    {
        $sql = "SELECT dados_comercio.*, comercio_tipo.id_tipo from 
        dados_comercio INNER JOIN comercio_tipo ON dados_comercio.id_comercio = comercio_tipo.id_tipo WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $sql = $sql->fetch();
            return $sql;
        }
    }

    public function editarDadosComercio($id_comercio, $nome, $face, $wts, $insta, $maps, $site, $id)
    {
        $sql = "UPDATE dados_comercio SET id_comercio = :id_comercio, nome = :nome, facebook = :facebook, wts = :wts, instagram = :instagram, url_maps = :url_maps, site = :site WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id_comercio", $id_comercio);
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":facebook", $face);
        $sql->bindValue(":wts", $wts);
        $sql->bindValue(":instagram", $insta);
        $sql->bindValue(":url_maps", $maps);
        $sql->bindValue(":site", $site);
        $sql->bindValue(":id", $id);
        $sql->execute();
    }
    public function delete_dados_comercio($id_comercio)
    {
        $sql = "DELETE FROM dados_comercio WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id_comercio);
        $sql->execute();
    }
    public function add_parceria($id_dados_comercio, $validacao_parceiro, $img_parceiro, $img_baner, $url)
    {
        $sql = $this->pdo->prepare("UPDATE dados_comercio SET parceiro = :parceiro WHERE id = :id");
        $sql->bindValue(":parceiro", $validacao_parceiro);
        $sql->bindValue(":id", $id_dados_comercio);
        $sql->execute();
        if (count($img_parceiro) > 0) {
            for ($q = 0; $q < count($img_parceiro['tmp_name']); $q++) {
                for ($i = 0; $i < count($img_baner['tmp_name']); $i++) {
                $tipo = $img_parceiro['type'][$q]; 
                $tipo2 = $img_baner['type'][$i];
                if (in_array($tipo, array('image/jpeg', 'image/png')) || in_array($tipo2, array('image/jpeg', 'image/png'))) {
                    $tmpname = md5(time() . rand(0, 9999)) . '.jpg';
                    $tmpname2 = md5(time() . rand(0, 9999)) . '.jpg';
                    move_uploaded_file($img_parceiro['tmp_name'][$q], 'assets/arquivos/' . $tmpname);
                    move_uploaded_file($img_baner['tmp_name'][$q], 'assets/arquivos/' . $tmpname2);
                    list($width_orig, $height_orig) = getimagesize('assets/arquivos/' . $tmpname);
                    list($width_orig, $height_orig) = getimagesize('assets/arquivos/' . $tmpname2);
                    $ratio = $width_orig / $height_orig;
                    $width = 200;
                    $height = 200;
                    if ($width / $height > $ratio) {
                        $width = $height * $ratio;
                    } else {
                        $height = $width / $ratio;
                    }
                    $img_parceiro = imagecreatetruecolor($width, $height);
                    $img_baner = imagecreatetruecolor($width, $height);

                    if ($tipo == 'image/jpeg') {
                        $origi = imagecreatefromjpeg('assets/arquivos/' . $tmpname);
                    } elseif ($tipo == 'image/png') {
                        $origi = imagecreatefrompng('assets/arquivos/' . $tmpname);
                    }
                    if ($tipo2 == 'image/jpeg') {
                        $origi = imagecreatefromjpeg('assets/arquivos/' . $tmpname2);
                    } elseif ($tipo == 'image/png') {
                        $origi = imagecreatefrompng('assets/arquivos/' . $tmpname2);
                    }
                    imagealphablending($origi, false);
                    imagesavealpha($origi, true);

                    imagecopyresampled($img_parceiro, $origi, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
                    imagecopyresampled($img_baner, $origi, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
                   
                    $sql = "INSERT INTO parceiros SET id_dados_comercio = :id_dados_comercio, validacao_parceiro = :validacao_parceiro, img_parceiro = :img_parceiro, img_baner = :img_baner, url = :url";
                    $sql = $this->pdo->prepare($sql);
                    $sql->bindValue(":id_dados_comercio", $id_dados_comercio);
                    $sql->bindValue(":validacao_parceiro", $validacao_parceiro);
                    $sql->bindValue(":img_parceiro", $tmpname);
                    $sql->bindValue(":img_baner", $tmpname2);
                    $sql->bindValue(":url", $url);
                    $sql->execute();
                }
            }
        }
    
}
    }
    public function dadosDeEstatistica()
    {
        // $sql = "SELECT *,(select comercio_tipo.nome_tipo from comercio_tipo where 
        // comercio_tipo.id_tipo = dados_comercio.id_comercio) as cat FROM dados_comercio WHERE id_comercio = id_comercio";
        // $sql = $this->pdo->query($sql);
        // if ($sql->rowCount() > 0) {
        //     $sql = $sql->fetchAll();
        //     $quant = $sql;
        //     $q = count($quant);
        //     foreach ($sql as $item) {
        //         if (!empty($item['facebook']) && $item['facebook'] != "null") {
        //             if ($item['cat'] == "Novo") {
        //                 echo count($item['facebook']) . "<br>";
        //                 $d = count($item['facebook']);
        //                 for ($d = $d; $d <= $q; $d++) {
        //                     print_r(count($item['facebook']));
        //                 }
        //             }
        //         }
        //     }
        // }

        //         $sql = "SELECT dados_comercio.*, comercio_tipo.* FROM dados_comercio INNER JOIN
        //          comercio_tipo ON dados_comercio.id_comercio = comercio_tipo.id_tipo where id_comercio = id_tipo";
        //         $sql = $this->pdo->query($sql);
        //         if ($sql->rowCount() > 0) {
        //             $sql = $sql->fetchAll();
        //             $var = 0;
        //             foreach ($sql as $item) {
        //                 if (!empty($item['site']) && $item['site'] != "null") {
        //                     if ($item['id_comercio'] == $item['id_tipo']) {
        //                         if ($item['nome_tipo'] == "Novo") {
        //                          $d = count($item['site']);
        //                          echo  $var += $d;
        //                     }
        //                 }
        //                 }
        //             }
        //         }
        //     }
        // }

        // SELECT *, count(facebook) as facebook, count(instagram) as instagram, count(wts) as wts, count(site) as site, (select comercio_tipo.id_tipo from comercio_tipo where 
        // comercio_tipo.id_tipo = dados_comercio.id_comercio) FROM dados_comercio WHERE id_comercio = id_comercio GROUP BY facebook, instagram
        $sql = "SELECT *, count(facebook), count(instagram), count(wts), count(site), count(url_maps), 
        (select comercio_tipo.id_tipo from comercio_tipo where
         comercio_tipo.id_tipo = dados_comercio.id_comercio) as t FROM dados_comercio WHERE id_comercio = id_comercio";
        $sql = $this->pdo->query($sql);
        if ($sql->rowCount() > 0) {
            $sql = $sql->fetchAll();
            //    $sql = $sql['t'];
            // print_r($sql);
        }
        //         $sql = "SELECT dados_comercio.*, comercio_tipo.* FROM dados_comercio 
        //         INNER JOIN comercio_tipo ON dados_comercio.id_comercio = comercio_tipo.id_tipo where id_comercio = id_tipo";
        //         $sql = $this->pdo->query($sql);
        //         if ($sql->rowCount() > 0) {
        //             $sql = $sql->fetchAll();
        //             //    $sql = $sql['t'];
        //             print_r($sql);
        //         }
    }
}
