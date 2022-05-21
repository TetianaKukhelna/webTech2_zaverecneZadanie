<?php


class OlympicGame
{
    private int $id;
    private string $type;
    private int $year;
    private int $order;
    private string $city;
    private string $country;


    private function getTypeString()
    {
        switch ($this->type){
            case "LOH":
                return "Letné olypijske hry";
            case "ZOH":
                return "Zimné olypijske hry";
        }
    }

    public function getRow()
    {
        return "<tr>
                    <td>$this->id</td>
                    <td>".$this->getTypeString()."</td>
                    <td>$this->year</td>
                    <td>$this->city</td>
                    <td>$this->country</td>
                </tr>";
    }
}