-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.30 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para antiquarias
CREATE DATABASE IF NOT EXISTS `antiquarias` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `antiquarias`;

-- Copiando estrutura para tabela antiquarias.material
CREATE TABLE IF NOT EXISTS `material` (
  `idmaterial` int DEFAULT NULL,
  `microfone` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `tv` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `caixa_som` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `iluminacao` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Copiando dados para a tabela antiquarias.material: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela antiquarias.playlist
CREATE TABLE IF NOT EXISTS `playlist` (
  `idplaylist` int DEFAULT NULL,
  `titulo` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `artista` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `modo` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Copiando dados para a tabela antiquarias.playlist: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela antiquarias.sala
CREATE TABLE IF NOT EXISTS `sala` (
  `idsala` int DEFAULT NULL,
  `quantidade_pessoas` int DEFAULT NULL,
  `quantidade_salas` int DEFAULT NULL,
  `comida` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Copiando dados para a tabela antiquarias.sala: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela antiquarias.tempo
CREATE TABLE IF NOT EXISTS `tempo` (
  `idtempo` int DEFAULT NULL,
  `horas` time DEFAULT NULL,
  `horario` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Copiando dados para a tabela antiquarias.tempo: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela antiquarias.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuarios` int DEFAULT NULL,
  `nome` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `telefone` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `login` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `senha` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Copiando dados para a tabela antiquarias.usuario: ~0 rows (aproximadamente)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
