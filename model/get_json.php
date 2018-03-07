<?php
/*
	Модель получения данных
*/	
	class Get_Forecast
	{				

		// метод для получения аналитиков $id = 0 возвращает всех
		function get_Analysts($id=0){			
			$j = file_get_contents( __DIR__ . DIRECTORY_SEPARATOR . 'Analysts.json' ); // в примере все файлы в корне
			$data = json_decode($j);
			$array = (array) $data;
			$all_analysts = $array['Rows'];
			$id_Analysts = array();
			
			foreach ($all_analysts as $item) {
				$id_Analysts[$item[0]] = $item ; 
			}
			
			if ($id == 0){								
				return $id_Analysts;
			} else {				
				return $id_Analysts[$id];
			}
		}

		// метод для получения маркетмейкеров(инвестдомов)
		function get_MarketMakers($id=0){			
			$j = file_get_contents( __DIR__ . DIRECTORY_SEPARATOR . 'MarketMakers.json' ); // в примере все файлы в корне
			$data 	= json_decode($j);
			$array 	= (array) $data;
			$all_MarketMakers 	= $array['Rows'];
			$id_MarketMakers 	= array();
			
			foreach ($all_MarketMakers as $item) {				
				$id_MarketMakers[$item[0]] = $item ;
			}
			
			if ($id == 0){								
				return $id_MarketMakers;
			} else {				
				$id_MarketMakers[$item[0]] 	= $item[$id] ;				
				return $id_MarketMakers;
			}
		}

		// метод для получения консенсус прогноза по акциям
		function get_PriceConsensus($id=0){			
			$j = file_get_contents( __DIR__ . DIRECTORY_SEPARATOR . 'PriceConsensus.json' ); // в примере все файлы в корне
			$data = json_decode($j);
			$array = (array) $data;
			$all_PriceConsensus = $array['Rows'];
			$id_PriceConsensus = array();
			
			foreach ($all_PriceConsensus as $item) {
				$id_PriceConsensus[$item[13]] = $item ; 
			}
			
			if ($id == 0){								
				return $id_PriceConsensus;
			} else {				
				return $id_PriceConsensus[$id];
			}
		}
	}


	$PriceConsensus = new Get_Forecast();
	print_r($PriceConsensus->get_PriceConsensus(25150));


?>