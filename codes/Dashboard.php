<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Cipriano
 * Date: 09/06/2018
 * Time: 22:11
 */
require_once 'config.php';
require_once 'Conexao.php';
require_once 'Ferramentas.php';
class Dashboard extends Conexao {

    public $resultado;

    public function qtdContatos(){
        $this->conectar();
        $sql = "SELECT COUNT(id) as lido FROM contato WHERE lido='0'";
        $run = mysqli_query($this->conexao,$sql);
        $row = mysqli_fetch_assoc($run);
        $this->resultado = $row['lido'];
        unset($sql,$run,$row);
    }
    public function qtdClientes(){
        $this->conectar();
        $sql = "SELECT COUNT(id) as clientes FROM clientes WHERE acesso = '1'";
        $run = mysqli_query($this->conexao,$sql);
        $row = mysqli_fetch_assoc($run);
        $this->resultado = $row['clientes'];
        unset($sql,$run,$row);
    }
    public function pedidosAbertos(){
        $this->conectar();
        $sql = "SELECT COUNT(id) as pedidos FROM pedidos WHERE status='Pedido Realizado'";
        $run = mysqli_query($this->conexao,$sql);
        $row = mysqli_fetch_assoc($run);
        $this->resultado = $row['pedidos'];
        unset($sql,$run,$row);
    }
    public function qtdProdutos(){
        $this->conectar();
        $sql = "SELECT COUNT(id) as produtos FROM produtos";
        $run = mysqli_query($this->conexao,$sql);
        $row = mysqli_fetch_assoc($run);
        $this->resultado = $row['produtos'];
        unset($sql,$row,$row);
    }

    public function vendido($data){
        $this->conectar();
        $sql = "SELECT SUM(total) AS valor FROM pedidos WHERE data='$data' AND status = 'Pedido Concluido'";
        $run = mysqli_query($this->conexao,$sql);
        $row = mysqli_fetch_assoc($run);
        $this->resultado = $row['valor'];
        unset($sql,$row,$run);
    }

    public function faturamento(){
        $total = 0;
        $m = date("m");
        $a = date("Y");

        for($w = 1; $w<=31; $w++){
            if ($w <=9){
                $dia = '0'.$w;
            }else{
                $dia = $w;
            }
            $data = $a.'-'.$m.'-'.$dia;
            $this->conectar();
            $sql = "SELECT SUM(total) AS valor FROM pedidos WHERE data='$data' AND status='Pedido Concluido'";
            $run = mysqli_query($this->conexao,$sql);
            $row = mysqli_fetch_assoc($run);
            $total += $row['valor'];
            $this->resultado = $total;
        }
        unset($sql,$run,$row,$total);
    }

    public function mostrarContatos(){
        $ferramenta = new Ferramentas();
        $this->conectar();
        $sql = "SELECT id,nome,assunto,data,lido FROM contato ORDER BY id DESC";
        $run = mysqli_query($this->conexao,$sql);
        $row = mysqli_fetch_assoc($run);

        if (empty($row)){
            echo "<tr><td colspan='4'>Não existem contatos</td></tr>";
        }else{
            $run = mysqli_query($this->conexao,$sql);
            while ($row = mysqli_fetch_assoc($run)){
                $id = $row['id'];
                if($row['lido'] == 0){
                    echo "<tr style='background-color: #ff7675'>";
                }else{
                    echo "<tr style='background-color: #2ecc71'>";
                }
                echo "<td style='color: white'>".$row['nome']."</td>";
                echo "<td style='color: white'>".$row['assunto']."</td>";
                echo "<td style='color: white'>".$row['data']."</td>";
                echo "<td><a class='btn btn-primary' style='margin-right: 5px;' href='exibirContato.php?id=$id'><i class='far fa-eye'></i></a>";
                echo "<button class='btn btn-warning' data-toggle='modal' data-target='#modal$id'><i class='fas fa-trash'></i></button></td>";
                echo "</tr>";
                $ferramenta->construirModal('Você realmente deseja apagar ?',$id);
            }
        }
        $ferramenta->ativarModal();
        unset($row,$run,$sql,$id,$row,$ferramenta);
    }

    public function exibirContato($id){
        $this->marcarVisualizado($id);
        $this->conectar();
        $sql = "SELECT nome,assunto,mensagem,data,email FROM contato WHERE id='$id' LIMIT 1";
        $run = mysqli_query($this->conexao,$sql);
        $row = mysqli_fetch_assoc($run);
        $this->resultado = $row;
        unset($sql,$row,$run);
    }

    public function marcarVisualizado($id){
        $this->conectar();
        $sql = "UPDATE contato SET lido='1' WHERE $id='$id'";
        mysqli_query($this->conexao,$sql);
        unset($sql);
    }

    public function mostrarClientes($parametro){
        $ferramentas = new Ferramentas();
        if ($parametro == 'padrao'){
            $this->conectar();
            $sql = "SELECT id,nome,email,telefone FROM clientes WHERE acesso ='1'";
            $run = mysqli_query($this->conexao,$sql);
            $row = mysqli_fetch_assoc($run);
            if (empty($row)){
                echo "<tr><td>Não existem clientes</td></tr>";
            }else{
                $run = mysqli_query($this->conexao,$sql);
                while ($row = mysqli_fetch_assoc($run)){
                    $id = $row['id'];
                    echo "<tr>";
                    echo "<td>".$row['nome']."</td>";
                    echo "<td>".$row['email']."</td>";
                    echo "<td>".$row['telefone']."</td>";
                    echo "<td><a class='btn btn-primary' style='margin-right: 5px;' href='exibirClientes.php?id=$id'><i class='far fa-eye'></i></a>";
                    echo "<button class='btn btn-warning' data-toggle='modal' data-target='#modal$id'><i class='fas fa-trash'></i></button></td>";
                    echo "</tr>";
                    $ferramentas->construirModal('Você realmente desejar apagar o cliente ?',$id);
                }
            }
        }else{
            $this->conectar();
            $sql = "SELECT id,nome,email,telefone FROM clientes WHERE nome LIKE '%$parametro%' AND acesso='1'";
            $run = mysqli_query($this->conexao,$sql);
            $row = mysqli_fetch_assoc($run);
            if (empty($row)){
                echo "<tr><td colspan='4'>Não existem clientes cadastrados</td></tr>";
            }else{
                $run = mysqli_query($this->conexao,$sql);
                while ($row = mysqli_fetch_assoc($run)){
                    $id = $row['id'];
                    echo "<tr>";
                    echo "<td>".$row['nome']."</td>";
                    echo "<td>".$row['email']."</td>";
                    echo "<td>".$row['telefone']."</td>";
                    echo "<td><a class='btn btn-primary' style='margin-right: 5px;' href='exibirClientes.php?id=$id'><i class='far fa-eye'></i></a>";
                    echo "<button class='btn btn-warning' data-toggle='modal' data-target='#modal$id'><i class='fas fa-trash'></i></button></td>";
                    echo "</tr>";
                    $ferramentas->construirModal('Você realmente desejar apagar o cliente ?',$id);
                }
            }
        }
        $ferramentas->ativarModal();
        unset($run,$row,$sql,$parametro,$ferramentas,$id);
    }

    public function apagar($id,$tabela){
        $this->conectar();
        $sql = "DELETE FROM $tabela WHERE id='$id'";
        if (mysqli_query($this->conexao,$sql)){
            $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Mensagem do sistema: O registro foi apagado com sucesso.</div>";
        }else{
            $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Mensagem do sistema: Não foi possivel excluir o registro.</div>";
        }
        unset($sql,$id,$tabela);
    }

    public function exibirCliente($id){
        $this->conectar();
        $sql = "SELECT nome,email,telefone,endereco,numero,bairro,cidade FROM clientes WHERE id='$id'";
        $run = mysqli_query($this->conexao,$sql);
        $row = mysqli_fetch_assoc($run);
        $this->resultado = $row;
        unset($row,$run,$sql);
    }

    public function mostrarPedidosCliente($email){
        $this->conectar();
        $sql = "SELECT id,total,data,status FROM pedidos WHERE email='$email'";
        $run = mysqli_query($this->conexao,$sql);
        $row = mysqli_fetch_assoc($run);
        if (empty($row)){
            echo "<tr><td colspan='4'>Não existem pedidos cadastrados para esse cliente.</td></tr>";
        }else{
            $run = mysqli_query($this->conexao,$sql);
            while ($row = mysqli_fetch_assoc($run)){
                $id = $row['id'];
                echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>R$ ".$row['total']."</td>";
                echo "<td>".$row['data']."</td>";
                echo "<td>".$row['status']."</td>";
                echo "<td><a class='btn btn-primary' style='margin-right: 5px;' href='exibirPedido.php?id=$id'><i class='far fa-eye'></i></a></td>";
                echo "</tr>";
            }
        }
        unset($sql,$run,$row,$id);
    }

    public function mostrarProdutos($parametro){
        $ferramentas = new Ferramentas();
        $this->conectar();
        if ($parametro == 'padrao'){
            $sql = "SELECT id,descricao,categoria FROM produtos";
        }else{
            $sql = "SELECT id,descricao,categoria FROM produtos WHERE categoria='$parametro'";
        }
        $run = mysqli_query($this->conexao,$sql);
        while ($row = mysqli_fetch_assoc($run)){
            $id = $row['id'];
            echo "<tr>";
            echo "<td>".$row['descricao']."</td>";
            echo "<td>".$row['categoria']."</td>";
            echo "<td><a class='btn btn-primary' style='margin-right: 5px;' href='exibirProdutos.php?id=$id'><i class='far fa-eye'></i></a>";
            echo "<button class='btn btn-warning' data-toggle='modal' data-target='#modal$id'><i class='fas fa-trash'></i></button></td>";
            echo "</tr>";
            $ferramentas->construirModal('Confirmar excluir cliente ?',$id);
        }
        $ferramentas->ativarModal();
        unset($row,$id,$parametro,$run,$ferramentas);
    }

    public function exibirProduto($id){
        $this->conectar();
        $sql = "SELECT id,descricao,preco,foto,categoria,desc1,desc2,desc3,desc4,desc5,desc6,desc7,desc8,desc9,desc10 FROM produtos WHERE id='$id'";
        $run = mysqli_query($this->conexao,$sql);
        $row = mysqli_fetch_assoc($run);
        $this->resultado = $row;
        unset($sql,$run,$row,$id);
    }

    public function exibirCategorias($parametro){
        $this->conectar();
        $sql = "SELECT * FROM categorias";
        $run = mysqli_query($this->conexao,$sql);
        while ($row = mysqli_fetch_assoc($run)){
            $categoria = $row['categoria'];
            if ($categoria !=$parametro) {
                echo "<option value='$categoria'>$categoria</option>";
            }
        }
        unset($categoria,$row,$run,$sql);
    }

    public function alterarCategoriaProduto($id,$categoria){
        $this->conectar();
        $sql = "UPDATE produtos SET categoria='$categoria' WHERE id=$id";
        if (mysqli_query($this->conexao,$sql)){
            $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Mensagem do sistema: Registro alterado com sucesso.</div>";
        }else{
            $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Mensagem do sistema: Não foi possivel alterar o registro.</div>";
        }
        unset($id,$categoria,$sql);
    }

    public function alterarDescProduto($id,$dados){
        $descricao = $dados['descricao'];
        $preco = $dados['preco'];
        $desc1 = $dados['desc1'];
        $desc2 = $dados['desc2'];
        $desc3 = $dados['desc3'];
        $desc4 = $dados['desc4'];
        $desc5 = $dados['desc5'];
        $desc6 = $dados['desc6'];
        $desc7 = $dados['desc7'];
        $desc8 = $dados['desc8'];
        $desc9 = $dados['desc9'];
        $desc10 = $dados['desc10'];
        $this->conectar();
        $sql = "UPDATE produtos SET descricao='$descricao',preco='$preco',desc1='$desc1',desc2='$desc2',desc3='$desc3',desc4='$desc4',desc5='$desc5',desc6='$desc6',desc7='$desc7',desc8='$desc8',desc9='$desc9',desc10='$desc10' WHERE id='$id'";
        if (mysqli_query($this->conexao,$sql)){
            $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Mensagem do sistema: Registro alterado com sucesso.</div>";
        }else{
            $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Mensagem do sistema: Não foi possivel alterar o registro.</div>";
        }
        unset($id,$sql,$descricao,$preco,$desc1,$desc2,$desc3,$desc4,$desc5,$desc6,$desc7,$desc8,$desc9,$desc10);
    }

    public function mostrarPedidos($parametro,$situacao){
            $ferramentas = new Ferramentas();
            $this->conectar();
            $sql = "SELECT id,cliente,status,data,total,email FROM pedidos ORDER BY id DESC ";
            $run = mysqli_query($this->conexao,$sql);
            while ($row = mysqli_fetch_assoc($run)){
                $this->conectar();
                $email = $row['email'];
                $sql1 = "SELECT id FROM clientes WHERE email='$email'";
                $run1 = mysqli_query($this->conexao,$sql1);
                $row1 = mysqli_fetch_assoc($run1);
                $id = $row['id'];
                $id_cliente = $row1['id'];
                echo "<tr>";
                echo "<td>".$row['cliente']."</td>";
                echo "<td>".$row['status']."</td>";
                echo "<td>".$row['total']."</td>";
                echo "<td>".$row['data']."</td>";

                echo "<td><a class='btn btn-primary' style='margin-right: 5px;' href='exibirPedido.php?id=$id'><i class='far fa-eye'></i></a>";
                echo "<a class='btn btn-success' style='margin-right: 5px;' href='exibirClientes.php?id=$id_cliente'><i class='fas fa-user-circle'></i></a>";
                echo "<button class='btn btn-warning' data-toggle='modal' data-target='#modal$id'><i class='fas fa-trash'></i></button></td>";
                echo "</tr>";
                $ferramentas->construirModal('Confirmar excluir pedido ?',$id);
            }
            $ferramentas->ativarModal();
            unset($id,$row,$email,$run1,$run,$row1,$sql1,$sql,$ferramentas);
        }

    public function exibirPedido($id){
        $this->conectar();
        $sql = "SELECT cliente,status,total,pagamento,data FROM pedidos WHERE id='$id'";
        $run = mysqli_query($this->conexao,$sql);
        $row = mysqli_fetch_assoc($run);
        $this->resultado = $row;
        unset($sql,$row,$run);
    }

    public function exibirItensPedido($id){
        $this->conectar();
        $sql = "SELECT pedido_id,produto,quantidade,preco,total FROM pedidos_itens WHERE pedido_id='$id'";
        $run = mysqli_query($this->conexao,$sql);
        while ($row = mysqli_fetch_assoc($run)){
            echo "<tr>";
            echo "<td>".$row['produto']."</td>";
            echo "<td>".$row['quantidade']."</td>";
            echo "<td>"."R$ ".$row['preco']."</td>";
            echo "<td>"."R$ ".$row['total']."</td>";
            echo "</tr>";
        }
    }

    public function corrigirValorPedido($id){
        $this->conectar();
        $sql = "SELECT SUM(total) AS valor FROM pedidos_itens WHERE pedido_id='$id'";
        $run = mysqli_query($this->conexao,$sql);
        $row = mysqli_fetch_assoc($run);
        $total = $row['valor'].'.00';
        $sql = "UPDATE pedidos SET total='$total' WHERE id='$id'";
        if (mysqli_query($this->conexao,$sql)){
            $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Mensagem do sistema: Registro alterado com sucesso.</div>";
        }else{
            $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Mensagem do sistema: Não foi possivel alterar o registro.</div>";
        }

    }

    public function alterarStatusPedido($id,$situacao){
        $this->conectar();
        $sql = "UPDATE pedidos SET status='$situacao' WHERE id='$id'";
        if (mysqli_query($this->conexao,$sql)){
            $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Mensagem do sistema: Registro alterado com sucesso.</div>";
        }else{
            $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Mensagem do sistema: Não foi possivel alterar o registro.</div>";
        }
        unset($sql,$id,$situacao);
    }

        public function deslogar(){
        unset($_SESSION['email']);
        unset($_SESSION['acesso']);
        unset($_SESSION['nome']);
        $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Mensagem do sistema: Deslogado com sucesso.</div>";
    header("location:../login.php"); die("erro");
}

}