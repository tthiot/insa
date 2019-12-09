<?php
/**
 * Gestion de poneys
 */
class Poneys
{
    private $count = 8;

    /**
     * Retourne le nombre de poneys
     *
     * @return void
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * Fixe le nombre de poneys
     *
     * @return void
     */
    public function setCount($number)
    {
        $this->count = $number;
    }

    /**
     * Ajoute un poney au champ
     *
     * @param int $number Nombre de poneys à ajouter
     *
     * @return void
     */
    public function addPoneyToField(int $number): void
    {
        if($number < 0)
        {
            throw new InvalidArgumentException('test');
        }
        $this->count += $number;
    }

    /**
     * Retire un poney du champ
     *
     * @param int $number Nombre de poneys à retirer
     *
     * @return void
     */
    public function removePoneyFromField(int $number): void
    {
        if($number<0){
            throw new InvalidArgumentException();
        }
        $this->count -= $number;
    }

    /**
     * Retourne les noms des poneys
     *
     * @return array
     */
    public function getNames(): array
    {

    }

    /**
     * Retourne true si il y a moins de15 poneys dans le champ
     *
     * @return bool
     */
    public function isFieldNotFull(): bool
    {
        return ($this->count<15);
    }
}
?>
