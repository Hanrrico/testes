
<?php
class Carrinho
{
    private $conn;

    public function __construct($conn)
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        if (!isset($_SESSION['carrinho'])) {
            $_SESSION['carrinho'] = [];
        }

        $this->conn = $conn; // conexão PDO ou mysqli
    }

    public function adicionarProduto($id, $quantidade = 1)
    {
        // Buscar produto no banco
        $stmt = $this->conn->prepare("SELECT nome, preco FROM produtos WHERE id_produto = ?");
        $stmt->execute([$id]);
        $produto = $stmt->fetch();

        if ($produto) {
            if (isset($_SESSION['carrinho'][$id])) {
                $_SESSION['carrinho'][$id]['quantidade'] += $quantidade;
            } else {
                $_SESSION['carrinho'][$id] = [
                    'nome' => $produto['nome'],
                    'preco' => $produto['preco'],
                    'quantidade' => $quantidade
                ];
            }
        }
    }

    public function removerProduto($id)
    {
        if (isset($_SESSION['carrinho'][$id])) {
            unset($_SESSION['carrinho'][$id]);
        }
    }

    public function listarItens()
    {
        return $_SESSION['carrinho'];
    }

    public function calcularTotal()
    {
        $total = 0;
        foreach ($_SESSION['carrinho'] as $item) {
            $total += $item['preco'] * $item['quantidade'];
        }
        return $total;
    }

    public function limparCarrinho()
    {
        $_SESSION['carrinho'] = [];
    }
}
