-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Jun-2023 às 19:19
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdaplicativo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbadministrador`
--

CREATE TABLE `tbadministrador` (
  `idAdministrador` int(11) NOT NULL,
  `nomeAdministrador` varchar(50) NOT NULL,
  `sobrenomeAdministrador` varchar(50) NOT NULL,
  `senhaAdministrador` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbadministrador`
--

INSERT INTO `tbadministrador` (`idAdministrador`, `nomeAdministrador`, `sobrenomeAdministrador`, `senhaAdministrador`) VALUES
(1, 'adm', 'silva', '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcidadao`
--

CREATE TABLE `tbcidadao` (
  `idCidadao` int(11) NOT NULL,
  `nomeCidadao` varchar(50) NOT NULL,
  `sobrenomeCidadao` varchar(50) NOT NULL,
  `emailCidadao` varchar(100) NOT NULL,
  `cpfCidadao` varchar(11) NOT NULL,
  `generoCidadao` varchar(10) NOT NULL,
  `DataNascCidadao` date NOT NULL,
  `logradouroCidadao` varchar(100) NOT NULL,
  `numLogCidadao` int(11) NOT NULL,
  `cepCidadao` varchar(8) NOT NULL,
  `complementoCidadao` varchar(100) NOT NULL,
  `bairroCidadao` varchar(100) NOT NULL,
  `cidadeCidadao` varchar(100) NOT NULL,
  `idSituacao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbcidadao`
--

INSERT INTO `tbcidadao` (`idCidadao`, `nomeCidadao`, `sobrenomeCidadao`, `emailCidadao`, `cpfCidadao`, `generoCidadao`, `DataNascCidadao`, `logradouroCidadao`, `numLogCidadao`, `cepCidadao`, `complementoCidadao`, `bairroCidadao`, `cidadeCidadao`, `idSituacao`) VALUES
(1, 'Kevin', 'Bomfim', 'kevin@gmial.com', '47745698871', 'M', '2004-10-15', 'Rua Mendonça', 194, '08461600', 'casa', 'Jardim São Paulo', 'São Paulo', 1),
(2, 'Gustavo', 'Reis', 'gustavo@gmail.com', '77801122925', 'M', '2005-10-05', 'Rua Mendonça', 123, '08461600', 'casa', 'Jardim São Paulo', 'São Paulo', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcor`
--

CREATE TABLE `tbcor` (
  `idCor` int(11) NOT NULL,
  `nomeCor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbcor`
--

INSERT INTO `tbcor` (`idCor`, `nomeCor`) VALUES
(1, 'Prata'),
(2, 'Vermelho'),
(3, 'Azul');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbdeclarante`
--

CREATE TABLE `tbdeclarante` (
  `idDeclarante` int(11) NOT NULL,
  `idCidadao` int(11) DEFAULT NULL,
  `idOcorrencia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbdeclarante`
--

INSERT INTO `tbdeclarante` (`idDeclarante`, `idCidadao`, `idOcorrencia`) VALUES
(1, 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbdelegado`
--

CREATE TABLE `tbdelegado` (
  `idDelegado` int(11) NOT NULL,
  `nomeDelegado` varchar(50) NOT NULL,
  `sobrenomeDelegado` varchar(50) NOT NULL,
  `cpfDelegado` varchar(11) NOT NULL,
  `generoDelegado` varchar(10) NOT NULL,
  `logradouroDelegado` varchar(100) NOT NULL,
  `numLogDelegado` int(11) NOT NULL,
  `cepDelegado` varchar(8) NOT NULL,
  `complementoDelegado` varchar(100) NOT NULL,
  `bairroDelegado` varchar(100) NOT NULL,
  `cidadeDelegado` varchar(100) NOT NULL,
  `senhaDelegado` varchar(50) NOT NULL,
  `idSecretaria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbdelegado`
--

INSERT INTO `tbdelegado` (`idDelegado`, `nomeDelegado`, `sobrenomeDelegado`, `cpfDelegado`, `generoDelegado`, `logradouroDelegado`, `numLogDelegado`, `cepDelegado`, `complementoDelegado`, `bairroDelegado`, `cidadeDelegado`, `senhaDelegado`, `idSecretaria`) VALUES
(1, 'Kevin', 'Bomifm', '47745698871', 'M', 'Rua Mendonça', 194, '08461600', 'casa', 'Jardim São Paulo', 'São Paulo', '123', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbenvolvidos`
--

CREATE TABLE `tbenvolvidos` (
  `idEnvolvidos` int(11) NOT NULL,
  `idCidadao` int(11) NOT NULL,
  `idOcorrencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbenvolvidos`
--

INSERT INTO `tbenvolvidos` (`idEnvolvidos`, `idCidadao`, `idOcorrencia`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbmarca`
--

CREATE TABLE `tbmarca` (
  `idMarca` int(11) NOT NULL,
  `nomeMarca` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbmarca`
--

INSERT INTO `tbmarca` (`idMarca`, `nomeMarca`) VALUES
(1, 'Fiat'),
(2, 'Peugeot'),
(3, 'Chevrolet');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbmodeloveiculo`
--

CREATE TABLE `tbmodeloveiculo` (
  `idModeloVeiculo` int(11) NOT NULL,
  `nomeModeloVeiculo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbmodeloveiculo`
--

INSERT INTO `tbmodeloveiculo` (`idModeloVeiculo`, `nomeModeloVeiculo`) VALUES
(1, 'Siena'),
(2, 'Peugeot 3008'),
(3, 'Onix');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbmulta`
--

CREATE TABLE `tbmulta` (
  `idMulta` int(11) NOT NULL,
  `motivoMulta` varchar(100) NOT NULL,
  `valorMulta` float NOT NULL,
  `horaMulta` time NOT NULL,
  `dataMulta` date NOT NULL,
  `cepMulta` char(8) NOT NULL,
  `logradouroMulta` varchar(25) NOT NULL,
  `bairroMulta` varchar(25) NOT NULL,
  `cidadeMulta` varchar(25) NOT NULL,
  `idVeiculo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbocorrencia`
--

CREATE TABLE `tbocorrencia` (
  `idOcorrencia` int(11) NOT NULL,
  `descricaoOcorrencia` varchar(100) NOT NULL,
  `dataOcorrencia` date NOT NULL,
  `objetosOcorrencia` varchar(200) DEFAULT NULL,
  `cepOcorrencia` varchar(8) NOT NULL,
  `horaOcorrencia` time NOT NULL,
  `relatoOcorrencia` varchar(150) NOT NULL,
  `idCidadao` int(11) NOT NULL,
  `idTipoOcorrencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbocorrencia`
--

INSERT INTO `tbocorrencia` (`idOcorrencia`, `descricaoOcorrencia`, `dataOcorrencia`, `objetosOcorrencia`, `cepOcorrencia`, `horaOcorrencia`, `relatoOcorrencia`, `idCidadao`, `idTipoOcorrencia`) VALUES
(1, 'Roubo de veiculo', '2023-06-15', 'Revolver', '08461600', '21:30:00', 'O ladrão chegou anunciando o assalto e pediu para sair do carro', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbocorrenciaveiculo`
--

CREATE TABLE `tbocorrenciaveiculo` (
  `idOcorrenciaVeiculo` int(11) NOT NULL,
  `descricaoOcorrenciaVeiculo` varchar(100) NOT NULL,
  `dataOcorrenciaVeiculo` date NOT NULL,
  `objetosOcorrenciaVeiculo` varchar(200) DEFAULT NULL,
  `cepOcorrenciaVeiculo` varchar(8) NOT NULL,
  `horaOcorrenciaVeiculo` time NOT NULL,
  `relatoOcorrenciaVeiculo` varchar(150) NOT NULL,
  `idVeiculo` int(11) NOT NULL,
  `idTipoOcorrencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbpolicial`
--

CREATE TABLE `tbpolicial` (
  `idPolicial` int(11) NOT NULL,
  `nomePolicial` varchar(50) NOT NULL,
  `sobrenomePolicial` varchar(50) NOT NULL,
  `cpfPolicial` varchar(11) NOT NULL,
  `generoPolicial` varchar(10) NOT NULL,
  `DataNascPolicial` date NOT NULL,
  `matriculaPolicia` char(9) NOT NULL,
  `logradouroPolicial` varchar(50) NOT NULL,
  `numLogPolicial` varchar(25) NOT NULL,
  `cepPolicial` char(8) NOT NULL,
  `complementoPolicial` varchar(25) DEFAULT NULL,
  `bairroPolicial` varchar(30) NOT NULL,
  `cidadePolicial` varchar(30) NOT NULL,
  `senhaPolicial` varchar(25) NOT NULL,
  `idSecretaria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbpolicial`
--

INSERT INTO `tbpolicial` (`idPolicial`, `nomePolicial`, `sobrenomePolicial`, `cpfPolicial`, `generoPolicial`, `DataNascPolicial`, `matriculaPolicia`, `logradouroPolicial`, `numLogPolicial`, `cepPolicial`, `complementoPolicial`, `bairroPolicial`, `cidadePolicial`, `senhaPolicial`, `idSecretaria`) VALUES
(1, 'Gustavo', 'Reis', '47745698871', 'M', '2004-10-15', '12345678', 'Rua Pastel', '666', '08461600', 'casa', 'Jardim São Paulo', 'São Paulo', '123', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbsecretaria`
--

CREATE TABLE `tbsecretaria` (
  `idSecretaria` int(11) NOT NULL,
  `senhaSecretaria` varchar(25) NOT NULL,
  `emailSecretaria` varchar(50) NOT NULL,
  `logradouroSecretaria` varchar(50) NOT NULL,
  `numLogSecretaria` varchar(25) NOT NULL,
  `cepSecretaria` char(8) NOT NULL,
  `bairroSecretaria` varchar(50) NOT NULL,
  `cidadeSecretaria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbsecretaria`
--

INSERT INTO `tbsecretaria` (`idSecretaria`, `senhaSecretaria`, `emailSecretaria`, `logradouroSecretaria`, `numLogSecretaria`, `cepSecretaria`, `bairroSecretaria`, `cidadeSecretaria`) VALUES
(1, '123', 'secretaria@org.com', 'Rua Professor Theotônio Pavão', '1884', '08461600', 'Jardim São Paulo', 'São Paulo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbsituacao`
--

CREATE TABLE `tbsituacao` (
  `idSituacao` int(11) NOT NULL,
  `nomeSituacao` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbsituacao`
--

INSERT INTO `tbsituacao` (`idSituacao`, `nomeSituacao`) VALUES
(1, 'Procurado'),
(2, 'Sem Pendencia'),
(3, 'Em análise');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbtelefonecidadao`
--

CREATE TABLE `tbtelefonecidadao` (
  `idTelefoneCidadao` int(11) NOT NULL,
  `telefoneCidadao` varchar(10) NOT NULL,
  `idCidadao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbtelefonepolicial`
--

CREATE TABLE `tbtelefonepolicial` (
  `idTelefonePolicial` int(11) NOT NULL,
  `telefonePolicial` varchar(15) NOT NULL,
  `idPolicial` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbtipocombustivel`
--

CREATE TABLE `tbtipocombustivel` (
  `idTipoCombustivel` int(11) NOT NULL,
  `TipoCombustivel` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbtipocombustivel`
--

INSERT INTO `tbtipocombustivel` (`idTipoCombustivel`, `TipoCombustivel`) VALUES
(1, 'Gasolina'),
(2, 'Álcool'),
(3, 'Diesel');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbtipoocorrencia`
--

CREATE TABLE `tbtipoocorrencia` (
  `idTipoOcorrencia` int(11) NOT NULL,
  `nomeOcorrencia` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbtipoocorrencia`
--

INSERT INTO `tbtipoocorrencia` (`idTipoOcorrencia`, `nomeOcorrencia`) VALUES
(1, 'Roubo'),
(2, 'Furto'),
(3, 'Latrocinio');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbtipoveiculo`
--

CREATE TABLE `tbtipoveiculo` (
  `idTipoVeiculo` int(11) NOT NULL,
  `nomeTipoVeiculo` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbtipoveiculo`
--

INSERT INTO `tbtipoveiculo` (`idTipoVeiculo`, `nomeTipoVeiculo`) VALUES
(1, 'COnvencional'),
(2, 'Trabalho');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbveiculo`
--

CREATE TABLE `tbveiculo` (
  `idVeiculo` int(11) NOT NULL,
  `placaVeiculo` char(7) NOT NULL,
  `tipoEixoVeiculo` varchar(2) NOT NULL,
  `idModeloVeiculo` int(11) NOT NULL,
  `idMarca` int(11) NOT NULL,
  `idCor` int(11) NOT NULL,
  `idTipoCombustivel` int(11) NOT NULL,
  `idTipoVeiculo` int(11) NOT NULL,
  `idCidadao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbveiculo`
--

INSERT INTO `tbveiculo` (`idVeiculo`, `placaVeiculo`, `tipoEixoVeiculo`, `idModeloVeiculo`, `idMarca`, `idCor`, `idTipoCombustivel`, `idTipoVeiculo`, `idCidadao`) VALUES
(1, 'pym8719', '2', 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbveiculosenvolvidos`
--

CREATE TABLE `tbveiculosenvolvidos` (
  `idTabelaVeiculosEnvolvidos` int(11) NOT NULL,
  `idVeiculo` int(11) NOT NULL,
  `idOcorrencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbveiculosenvolvidos`
--

INSERT INTO `tbveiculosenvolvidos` (`idTabelaVeiculosEnvolvidos`, `idVeiculo`, `idOcorrencia`) VALUES
(1, 1, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbadministrador`
--
ALTER TABLE `tbadministrador`
  ADD PRIMARY KEY (`idAdministrador`);

--
-- Índices para tabela `tbcidadao`
--
ALTER TABLE `tbcidadao`
  ADD PRIMARY KEY (`idCidadao`),
  ADD KEY `idSituacao` (`idSituacao`);

--
-- Índices para tabela `tbcor`
--
ALTER TABLE `tbcor`
  ADD PRIMARY KEY (`idCor`);

--
-- Índices para tabela `tbdeclarante`
--
ALTER TABLE `tbdeclarante`
  ADD PRIMARY KEY (`idDeclarante`),
  ADD KEY `idCidadao` (`idCidadao`),
  ADD KEY `idOcorrencia` (`idOcorrencia`);

--
-- Índices para tabela `tbdelegado`
--
ALTER TABLE `tbdelegado`
  ADD PRIMARY KEY (`idDelegado`),
  ADD KEY `idSecretaria` (`idSecretaria`);

--
-- Índices para tabela `tbenvolvidos`
--
ALTER TABLE `tbenvolvidos`
  ADD PRIMARY KEY (`idEnvolvidos`),
  ADD KEY `idCidadao` (`idCidadao`),
  ADD KEY `idOcorrencia` (`idOcorrencia`);

--
-- Índices para tabela `tbmarca`
--
ALTER TABLE `tbmarca`
  ADD PRIMARY KEY (`idMarca`);

--
-- Índices para tabela `tbmodeloveiculo`
--
ALTER TABLE `tbmodeloveiculo`
  ADD PRIMARY KEY (`idModeloVeiculo`);

--
-- Índices para tabela `tbmulta`
--
ALTER TABLE `tbmulta`
  ADD PRIMARY KEY (`idMulta`),
  ADD KEY `idVeiculo` (`idVeiculo`);

--
-- Índices para tabela `tbocorrencia`
--
ALTER TABLE `tbocorrencia`
  ADD PRIMARY KEY (`idOcorrencia`),
  ADD KEY `idCidadao` (`idCidadao`),
  ADD KEY `idTipoOcorrencia` (`idTipoOcorrencia`);

--
-- Índices para tabela `tbocorrenciaveiculo`
--
ALTER TABLE `tbocorrenciaveiculo`
  ADD PRIMARY KEY (`idOcorrenciaVeiculo`),
  ADD KEY `idVeiculo` (`idVeiculo`),
  ADD KEY `idTipoOcorrencia` (`idTipoOcorrencia`);

--
-- Índices para tabela `tbpolicial`
--
ALTER TABLE `tbpolicial`
  ADD PRIMARY KEY (`idPolicial`),
  ADD KEY `idSecretaria` (`idSecretaria`);

--
-- Índices para tabela `tbsecretaria`
--
ALTER TABLE `tbsecretaria`
  ADD PRIMARY KEY (`idSecretaria`);

--
-- Índices para tabela `tbsituacao`
--
ALTER TABLE `tbsituacao`
  ADD PRIMARY KEY (`idSituacao`);

--
-- Índices para tabela `tbtelefonecidadao`
--
ALTER TABLE `tbtelefonecidadao`
  ADD PRIMARY KEY (`idTelefoneCidadao`),
  ADD KEY `idCidadao` (`idCidadao`);

--
-- Índices para tabela `tbtelefonepolicial`
--
ALTER TABLE `tbtelefonepolicial`
  ADD PRIMARY KEY (`idTelefonePolicial`),
  ADD KEY `idPolicial` (`idPolicial`);

--
-- Índices para tabela `tbtipocombustivel`
--
ALTER TABLE `tbtipocombustivel`
  ADD PRIMARY KEY (`idTipoCombustivel`);

--
-- Índices para tabela `tbtipoocorrencia`
--
ALTER TABLE `tbtipoocorrencia`
  ADD PRIMARY KEY (`idTipoOcorrencia`);

--
-- Índices para tabela `tbtipoveiculo`
--
ALTER TABLE `tbtipoveiculo`
  ADD PRIMARY KEY (`idTipoVeiculo`);

--
-- Índices para tabela `tbveiculo`
--
ALTER TABLE `tbveiculo`
  ADD PRIMARY KEY (`idVeiculo`),
  ADD KEY `idModeloVeiculo` (`idModeloVeiculo`),
  ADD KEY `idMarca` (`idMarca`),
  ADD KEY `idCor` (`idCor`),
  ADD KEY `idTipoCombustivel` (`idTipoCombustivel`),
  ADD KEY `idTipoVeiculo` (`idTipoVeiculo`),
  ADD KEY `idCidadao` (`idCidadao`);

--
-- Índices para tabela `tbveiculosenvolvidos`
--
ALTER TABLE `tbveiculosenvolvidos`
  ADD PRIMARY KEY (`idTabelaVeiculosEnvolvidos`),
  ADD KEY `idVeiculo` (`idVeiculo`),
  ADD KEY `idOcorrencia` (`idOcorrencia`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbadministrador`
--
ALTER TABLE `tbadministrador`
  MODIFY `idAdministrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbcidadao`
--
ALTER TABLE `tbcidadao`
  MODIFY `idCidadao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbcor`
--
ALTER TABLE `tbcor`
  MODIFY `idCor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tbdeclarante`
--
ALTER TABLE `tbdeclarante`
  MODIFY `idDeclarante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbdelegado`
--
ALTER TABLE `tbdelegado`
  MODIFY `idDelegado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbenvolvidos`
--
ALTER TABLE `tbenvolvidos`
  MODIFY `idEnvolvidos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbmarca`
--
ALTER TABLE `tbmarca`
  MODIFY `idMarca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tbmodeloveiculo`
--
ALTER TABLE `tbmodeloveiculo`
  MODIFY `idModeloVeiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tbmulta`
--
ALTER TABLE `tbmulta`
  MODIFY `idMulta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbocorrencia`
--
ALTER TABLE `tbocorrencia`
  MODIFY `idOcorrencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbocorrenciaveiculo`
--
ALTER TABLE `tbocorrenciaveiculo`
  MODIFY `idOcorrenciaVeiculo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbpolicial`
--
ALTER TABLE `tbpolicial`
  MODIFY `idPolicial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbsecretaria`
--
ALTER TABLE `tbsecretaria`
  MODIFY `idSecretaria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbsituacao`
--
ALTER TABLE `tbsituacao`
  MODIFY `idSituacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tbtelefonecidadao`
--
ALTER TABLE `tbtelefonecidadao`
  MODIFY `idTelefoneCidadao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbtelefonepolicial`
--
ALTER TABLE `tbtelefonepolicial`
  MODIFY `idTelefonePolicial` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbtipocombustivel`
--
ALTER TABLE `tbtipocombustivel`
  MODIFY `idTipoCombustivel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tbtipoocorrencia`
--
ALTER TABLE `tbtipoocorrencia`
  MODIFY `idTipoOcorrencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tbtipoveiculo`
--
ALTER TABLE `tbtipoveiculo`
  MODIFY `idTipoVeiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbveiculo`
--
ALTER TABLE `tbveiculo`
  MODIFY `idVeiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbveiculosenvolvidos`
--
ALTER TABLE `tbveiculosenvolvidos`
  MODIFY `idTabelaVeiculosEnvolvidos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbcidadao`
--
ALTER TABLE `tbcidadao`
  ADD CONSTRAINT `tbcidadao_ibfk_1` FOREIGN KEY (`idSituacao`) REFERENCES `tbsituacao` (`idSituacao`);

--
-- Limitadores para a tabela `tbdeclarante`
--
ALTER TABLE `tbdeclarante`
  ADD CONSTRAINT `tbdeclarante_ibfk_1` FOREIGN KEY (`idCidadao`) REFERENCES `tbcidadao` (`idCidadao`),
  ADD CONSTRAINT `tbdeclarante_ibfk_2` FOREIGN KEY (`idOcorrencia`) REFERENCES `tbocorrencia` (`idOcorrencia`);

--
-- Limitadores para a tabela `tbdelegado`
--
ALTER TABLE `tbdelegado`
  ADD CONSTRAINT `tbdelegado_ibfk_1` FOREIGN KEY (`idSecretaria`) REFERENCES `tbsecretaria` (`idSecretaria`);

--
-- Limitadores para a tabela `tbenvolvidos`
--
ALTER TABLE `tbenvolvidos`
  ADD CONSTRAINT `tbenvolvidos_ibfk_1` FOREIGN KEY (`idCidadao`) REFERENCES `tbcidadao` (`idCidadao`),
  ADD CONSTRAINT `tbenvolvidos_ibfk_2` FOREIGN KEY (`idOcorrencia`) REFERENCES `tbocorrencia` (`idOcorrencia`);

--
-- Limitadores para a tabela `tbmulta`
--
ALTER TABLE `tbmulta`
  ADD CONSTRAINT `tbmulta_ibfk_1` FOREIGN KEY (`idVeiculo`) REFERENCES `tbveiculo` (`idVeiculo`);

--
-- Limitadores para a tabela `tbocorrencia`
--
ALTER TABLE `tbocorrencia`
  ADD CONSTRAINT `tbocorrencia_ibfk_1` FOREIGN KEY (`idCidadao`) REFERENCES `tbcidadao` (`idCidadao`),
  ADD CONSTRAINT `tbocorrencia_ibfk_2` FOREIGN KEY (`idTipoOcorrencia`) REFERENCES `tbtipoocorrencia` (`idTipoOcorrencia`);

--
-- Limitadores para a tabela `tbocorrenciaveiculo`
--
ALTER TABLE `tbocorrenciaveiculo`
  ADD CONSTRAINT `tbocorrenciaveiculo_ibfk_1` FOREIGN KEY (`idVeiculo`) REFERENCES `tbveiculo` (`idVeiculo`),
  ADD CONSTRAINT `tbocorrenciaveiculo_ibfk_2` FOREIGN KEY (`idTipoOcorrencia`) REFERENCES `tbtipoocorrencia` (`idTipoOcorrencia`);

--
-- Limitadores para a tabela `tbpolicial`
--
ALTER TABLE `tbpolicial`
  ADD CONSTRAINT `tbpolicial_ibfk_1` FOREIGN KEY (`idSecretaria`) REFERENCES `tbsecretaria` (`idSecretaria`);

--
-- Limitadores para a tabela `tbtelefonecidadao`
--
ALTER TABLE `tbtelefonecidadao`
  ADD CONSTRAINT `tbtelefonecidadao_ibfk_1` FOREIGN KEY (`idCidadao`) REFERENCES `tbcidadao` (`idCidadao`);

--
-- Limitadores para a tabela `tbtelefonepolicial`
--
ALTER TABLE `tbtelefonepolicial`
  ADD CONSTRAINT `tbtelefonepolicial_ibfk_1` FOREIGN KEY (`idPolicial`) REFERENCES `tbpolicial` (`idPolicial`);

--
-- Limitadores para a tabela `tbveiculo`
--
ALTER TABLE `tbveiculo`
  ADD CONSTRAINT `tbveiculo_ibfk_1` FOREIGN KEY (`idModeloVeiculo`) REFERENCES `tbmodeloveiculo` (`idModeloVeiculo`),
  ADD CONSTRAINT `tbveiculo_ibfk_2` FOREIGN KEY (`idMarca`) REFERENCES `tbmarca` (`idMarca`),
  ADD CONSTRAINT `tbveiculo_ibfk_3` FOREIGN KEY (`idCor`) REFERENCES `tbcor` (`idCor`),
  ADD CONSTRAINT `tbveiculo_ibfk_4` FOREIGN KEY (`idTipoCombustivel`) REFERENCES `tbtipocombustivel` (`idTipoCombustivel`),
  ADD CONSTRAINT `tbveiculo_ibfk_5` FOREIGN KEY (`idTipoVeiculo`) REFERENCES `tbtipoveiculo` (`idTipoVeiculo`),
  ADD CONSTRAINT `tbveiculo_ibfk_6` FOREIGN KEY (`idCidadao`) REFERENCES `tbcidadao` (`idCidadao`);

--
-- Limitadores para a tabela `tbveiculosenvolvidos`
--
ALTER TABLE `tbveiculosenvolvidos`
  ADD CONSTRAINT `tbveiculosenvolvidos_ibfk_1` FOREIGN KEY (`idVeiculo`) REFERENCES `tbveiculo` (`idVeiculo`),
  ADD CONSTRAINT `tbveiculosenvolvidos_ibfk_2` FOREIGN KEY (`idOcorrencia`) REFERENCES `tbocorrencia` (`idOcorrencia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
