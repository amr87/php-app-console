<?php
/**
 * The output contract
 * create as many classes you wish that adhered to it to change the output format.
 *
 *  @author Amr Gamal <amr.gamal878@gmail.com>
 */
interface OutputInterface
{
    /**
     * output Report.
     *
     * @param [array] $data
     */
    public function output(array $data);
}
