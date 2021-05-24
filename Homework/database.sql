
CREATE TABLE `preferiti` (
  `id` int(11) NOT NULL,
  `title` varchar(32) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `descr` varchar(32) DEFAULT NULL,
  `id_utente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `since` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `name`, `surname`, `since`) VALUES
(1, 'Giuseppe24', '$2y$10$mQXCjj9UbEou2X1ncUEaJe1w7iFy1S2A0h5ZkdmBpnl7R3nwDd2Dm', 'giuseppelobianco2497@gmail.com', 'Giuseppe', 'Lo Bianco', '2021-05-09 15:02:59'),

