<?php

class ConexaoBanco extends PDO {

  private static $instance = null;

  public function __construct($dsn,$user,$pass){
      parent::__construct($dsn,$user,$pass);
  }

  public static function getInstance(){
    if(!isset(self::$instance)){
      try{
        self::$instance = new ConexaoBanco("mysql:host=localhost","root","");
      }catch(PDOException $e){
        echo "Erro ao conectar! ".$e;
      }
    }
    return self::$instance;
  }
}

class CriaDB{
  private $conexao = null;
  public function __construct(){
    $this->conexao = ConexaoBanco::getInstance();
  }
  public function __destruct(){}

    public function criaBanco($query){
      try {
        $stat = $this->conexao->prepare($query);
        $stat->execute();
      } catch (PDOException $pe) {
        echo "Erro".$pe;
      }
    }
}

$query="
SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = '+00:00';


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estqcontrole`
--
CREATE DATABASE IF NOT EXISTS `estqcontrole` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `estqcontrole`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `id` int(4) NOT NULL,
  `Nome` varchar(24) DEFAULT NULL,
  `CNPJ` varchar(14) NOT NULL,
  `Endereco` varchar(16) DEFAULT NULL,
  `Email` varchar(23) DEFAULT NULL,
  `Estado` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `fornecedores`
--

INSERT INTO `fornecedores` (`id`, `Nome`, `CNPJ`, `Endereco`, `Email`, `Estado`) VALUES
(1021, 'Distribuidora Toma Todas', '1490000000000', 'Rua A, 555', 'comercial@dtt.com.br', 'RS'),
(1222, 'Refris S.A', '3010000000000', 'Rua do Campo, 44', 'comercial@refris.com.br', 'SP'),
(5445, 'Nestly LTDA', '9520000000000', 'Avenida Ipiranga', 'comercial@nestly.com.br', 'BA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecstatus`
--

CREATE TABLE `fornecstatus` (
  `idFornec` int(4) DEFAULT NULL,
  `Status` int(1) DEFAULT NULL,
  `EstqMin` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `fornecstatus`
--

INSERT INTO `fornecstatus` (`idFornec`, `Status`, `EstqMin`) VALUES
(1021, 1, 0),
(1222, 1, 0),
(5445, 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id` int(1) NOT NULL,
  `IdGrupo` int(1) NOT NULL,
  `Login` varchar(80) NOT NULL,
  `Senha` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id`, `IdGrupo`, `Login`, `Senha`) VALUES
(1, 1, 'administrador', 'e9ebc12967b0d63164aae7b7798887f0'),
(2, 2, 'vendedor', 'e9ebc12967b0d63164aae7b7798887f0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupos`
--

CREATE TABLE `grupos` (
  `id` int(11) NOT NULL,
  `Nome` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `grupos`
--

INSERT INTO `grupos` (`id`, `Nome`) VALUES
(1, 'Administrador'),
(2, 'Operador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `Nome` varchar(18) DEFAULT NULL,
  `idTipo` int(11) DEFAULT NULL,
  `Valor` double NOT NULL,
  `Vendas` varchar(3) DEFAULT NULL,
  `EstqLoja` varchar(3) DEFAULT NULL,
  `EstqMin` varchar(3) DEFAULT NULL,
  `EstqEntrada` int(11) NOT NULL,
  `CodFornec` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `Nome`, `idTipo`, `Valor`, `Vendas`, `EstqLoja`, `EstqMin`, `EstqEntrada`, `CodFornec`) VALUES
(1, 'Itaipava', 1, 1.5, '10', '190', '12', 200, 1021),
(2, 'Skol', 1, 1.7, '50', '250', '12', 300, 1021),
(3, 'Del Vale', 2, 2.1, '100', '0', '12', 100, 1021),
(4, 'Pepsi Cola 2L', 3, 3, '810', '-1', '50', 800, 1222),
(5, 'Guaraná Charrua 2L', 3, 2.5, '274', '66', '100', 340, 1222),
(6, 'Bis Branco', 4, 2.7, '10', '40', '50', 50, 5445);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo`
--

CREATE TABLE `tipo` (
  `id` int(1) NOT NULL,
  `Nome` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipo`
--

INSERT INTO `tipo` (`id`, `Nome`) VALUES
(1, 'Cerveja'),
(2, 'Suco'),
(3, 'Refrigerante'),
(4, 'Chocolate');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendaprodutos`
--

CREATE TABLE `vendaprodutos` (
  `idVendas` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `vendaprodutos`
--

INSERT INTO `vendaprodutos` (`idVendas`, `idProduto`, `quantidade`) VALUES
(1, 1, 5),
(1, 2, 15),
(1, 4, 10),
(2, 6, 10),
(1, 6, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id`, `status`) VALUES
(1, 0),
(2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fornecstatus`
--
ALTER TABLE `fornecstatus`
  ADD KEY `idFornec` (`idFornec`);

--
-- Indexes for table `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IdGrupo` (`IdGrupo`);

--
-- Indexes for table `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idTipo` (`idTipo`);

--
-- Indexes for table `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendaprodutos`
--
ALTER TABLE `vendaprodutos`
  ADD KEY `idProduto` (`idProduto`),
  ADD KEY `idVendas` (`idVendas`);

--
-- Indexes for table `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `fornecstatus`
--
ALTER TABLE `fornecstatus`
  ADD CONSTRAINT `fornecstatus_ibfk_1` FOREIGN KEY (`idFornec`) REFERENCES `fornecedores` (`id`);

--
-- Limitadores para a tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD CONSTRAINT `funcionarios_ibfk_1` FOREIGN KEY (`IdGrupo`) REFERENCES `grupos` (`id`);

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`idTipo`) REFERENCES `tipo` (`id`);

--
-- Limitadores para a tabela `vendaprodutos`
--
ALTER TABLE `vendaprodutos`
  ADD CONSTRAINT `vendaprodutos_ibfk_2` FOREIGN KEY (`idProduto`) REFERENCES `produtos` (`id`),
  ADD CONSTRAINT `vendaprodutos_ibfk_3` FOREIGN KEY (`idVendas`) REFERENCES `vendas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
";

$db = new CriaDB();
$db->criaBanco($query);

?>
