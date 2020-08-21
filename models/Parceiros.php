<?php
class Parceiros extends model
{
    private $uid;
    public function getParceiros()
    {
        $sql = "SELECT * FROM parceiros";
        $sql = $this->pdo->prepare($sql);
        $sql->execute();
        if ($sql->rowCount() > 0) {

            $sql = $sql->fetchAll();

            return $sql;
        }
    }
    public function todosParceiros($id)
    {
        $sql = "SELECT comercio_tipo.*, dados_comercio.*, parceiros.* from comercio_tipo 
         INNER JOIN dados_comercio ON comercio_tipo.id_tipo = dados_comercio.id_comercio
         INNER JOIN parceiros ON parceiros.id_dados_comercio = dados_comercio.id WHERE id_dados_comercio = :id_dados_comercio";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id_dados_comercio", $id);

        $sql->execute();
        if ($sql->rowCount() > 0) {

            $sql = $sql->fetchAll();

            return $sql;
        }
    }
    // public function parceirosCadastrados()
    // {
    //     $sql = "SELECT comercio_tipo.*, dados_comercio.*, parceiros.* from comercio_tipo 
    //      INNER JOIN dados_comercio ON comercio_tipo.id_tipo = dados_comercio.id_comercio
    //      INNER JOIN parceiros ON parceiros.id_dados_comercio = dados_comercio.id";
    //     $sql = $this->pdo->prepare($sql);
    //     // $sql->bindValue(":id_dados_comercio", $id);

    //     $sql->execute();
    //     if ($sql->rowCount() > 0) {

    //         $sql = $sql->fetchAll();

    //         return $sql;
    //     }
    // }
    public function inserir_anuncio_parceiro($id_parceiro, $descricao, $valor)
    {
        $sql = $this->pdo->prepare("INSERT INTO anuncios_parceiro SET id_parceiro = :id_parceiro, descricao = :descricao, valor = :valor");
        $sql->bindValue(":id_parceiro", $id_parceiro);
        $sql->bindValue(":descricao", $descricao);
        $sql->bindValue(":valor", $valor);
        $sql->execute();
    }
    public function getDadosParceiros($id)
    {

        if (!empty($id) && isset($id)) {
            $sql = "SELECT imgs_anuncios_parceiros.*, anuncios_parceiro.* from imgs_anuncios_parceiros INNER JOIN anuncios_parceiro ON 
            imgs_anuncios_parceiros.id_anuncio_parceiro = anuncios_parceiro.id WHERE id_parceiro = :id_parceiro";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":id_parceiro", $id);
            $sql->execute();
            if ($sql->rowCount() > 0) {
                $array = $sql->fetchAll();
                return $array;
            }
        } else {
            // $sql = array();
            $sql = "SELECT *, (select imgs_anuncios_parceiros.url_img_parceiro FROM imgs_anuncios_parceiros 
            where imgs_anuncios_parceiros.id_anuncio_parceiro = anuncios_parceiro.id limit 1)
             as url_img_parceiro FROM anuncios_parceiro ";
            $sql = $this->pdo->prepare($sql);
            $sql->execute();
            if ($sql->rowCount() > 0) {
                $sql = $sql->fetchAll();
            }
            return $sql;
        }
    }
    public function Localizacao()
    {
        $sql = "SELECT comercio_tipo.*, imagens_come.* FROM comercio_tipo INNER JOIN imagens_come ON comercio_tipo.id_tipo = imagens_come.id_tipo_comercio";
        $sql = $this->pdo->query($sql);

        if ($sql->rowCount() > 0) {
            $sql = $sql->fetchAll();
            return $sql;
        }
    }
    public function update_parceiro($id_anuncio_parceiro, $descricao, $img)
    {
        $sql = $this->pdo->prepare("UPDATE anuncios_parceiro SET descricao = :descricao WHERE id = :id");
        $sql->bindValue(":descricao", $descricao);
        $sql->bindValue(":id", $id_anuncio_parceiro);
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
                    $sql = $this->pdo->prepare("INSERT INTO imgs_anuncios_parceiros SET id_anuncio_parceiro = :id_anuncio_parceiro, url_img_parceiro = :url_img_parceiro
");
                    $sql->bindvalue(":id_anuncio_parceiro", $id_anuncio_parceiro);
                    $sql->bindvalue(":url_img_parceiro", $tmpname);
                    $sql->execute();
                }
            }
        }
    }
    public function getAnunciosParceiros($id_anuncio_parceiro)
    {
        $sql = "SELECT *, (select imgs_anuncios_parceiros.url_img_parceiro FROM imgs_anuncios_parceiros 
        where imgs_anuncios_parceiros.id_anuncio_parceiro = anuncios_parceiro.id limit 1)
         as url_img_parceiro FROM anuncios_parceiro WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id_anuncio_parceiro);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
            $array['url_img_parceiro'] = array();

            $sql = "SELECT * FROM imgs_anuncios_parceiros WHERE id_anuncio_parceiro = :id_anuncio_parceiro";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":id_anuncio_parceiro", $id_anuncio_parceiro);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $array['url_img_parceiro'] = $sql->fetchAll();
            } else {
                $array['url_img_parceiro'] = array();
            }
            return $array;
        }
    }
    public function getTodosAnunciosParceiros($urEli)
    {
        $sql = "SELECT imgs_anuncios_parceiros.*, anuncios_parceiro.*, parceiros.url from imgs_anuncios_parceiros
         INNER JOIN anuncios_parceiro ON imgs_anuncios_parceiros.id_anuncio_parceiro = anuncios_parceiro.id
         INNER JOIN parceiros ON parceiros.id = anuncios_parceiro.id_parceiro WHERE url = :url";

        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":url", $urEli);

        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }
    public function excluirFoto($id)
    {
        $url_img_parceiro = 0;
        $id_anuncio_parceiro = 0;
        $sql = $this->pdo->prepare("SELECT id_anuncio_parceiro, url_img_parceiro FROM imgs_anuncios_parceiros WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $row = $sql->fetch();
            $id_anuncio_parceiro = $row['id_anuncio_parceiro'];
            $url_img_parceiro = $row['url_img_parceiro'];
            // echo $url_img_parceiro ;
            $sql = $this->pdo->prepare("DELETE FROM imgs_anuncios_parceiros WHERE id = :id");
            $sql->bindValue(":id", $id);
            $sql->execute();
            return $id_anuncio_parceiro;
            return $url_img_parceiro;
        }
    }
    public function excluirFotoDietorio($id)
    {
        $url_img_parceiro = 0;
        $id_anuncio_parceiro = 0;
        $sql = $this->pdo->prepare("SELECT url_img_parceiro FROM imgs_anuncios_parceiros WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $row = $sql->fetch();
            $url_img_parceiro = $row['url_img_parceiro'];
            echo $url_img_parceiro;
            return $url_img_parceiro;
        }
    }
   
   
}
