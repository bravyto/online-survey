<?php

use Khill\Lavacharts\Lavacharts;

$reasons = Lava::DataTable();

$reasons->addStringColumn('Reasons')
        ->addNumberColumn('Percent')
        ->addRow(array('Check Reviews', 5))
        ->addRow(array('Watch Trailers', 2))
        ->addRow(array('See Actors Other Work', 4))
        ->addRow(array('Settle Argument', 89));

$piechart = Lava::PieChart('IMDB')
                 ->setOptions(array(
                   'datatable' => $reasons,
                   'title' => 'Reasons I visit IMDB',
                   'is3D' => true,
                     'slices' => array(
                        Lava::Slice(array(
                          'offset' => 0.2
                        )),
                        Lava::lice(array(
                          'offset' => 0.25
                        )),
                        Lava::Slice(array(
                          'offset' => 0.3
                        ))
                      )
                  ));