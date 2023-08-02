<?php

function changeDateFormate($date, $date_format){
          $parsedDate = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date);
      
          if (!$parsedDate) {
              return null; 
          }
      
          return $parsedDate->format($date_format);
      }