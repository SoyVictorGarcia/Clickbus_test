<?php

namespace App\Entity;

use App\Repository\OperationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="operation")
 * @ORM\Entity(repositoryClass=OperationRepository::class)
 */
class Operation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id",type="integer")
     */
    private $id;
    /**
     * @ORM\Column(name="amount",type="float", length=10, unique=false, nullable=false)
     */
    private $amount;
    /**
     * @ORM\Column(name="from_currency",type="string", length=3, unique=false, nullable=false)
     */
    private $from_currency;
    /**
     * @ORM\Column(name="to_currency",type="string", length=3, unique=false, nullable=false)
     */
    private $to_currency;
    /**
     * @ORM\Column(name="uuid_operation",type="string", length=36, unique=false, nullable=false)
     */
    private $operation_uuid;
    /**
     * @ORM\Column(name="converted_value",type="float", length=10, unique=false, nullable=false)
     */
    private $converted_value;
    /**
     * @ORM\Column(name="created_at",type="datetime", length=3, unique=false, nullable=false)
     */
    private $created_at;
    /**
     * @ORM\Column(name="updated_at",type="datetime", length=3, unique=false, nullable=false)
     */
    private $updated_at;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     *
     * @return self
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFromCurrency()
    {
        return $this->from_currency;
    }

    /**
     * @param mixed $from_currency
     *
     * @return self
     */
    public function setFromCurrency($from_currency)
    {
        $this->from_currency = $from_currency;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getToCurrency()
    {
        return $this->to_currency;
    }

    /**
     * @param mixed $to_currency
     *
     * @return self
     */
    public function setToCurrency($to_currency)
    {
        $this->to_currency = $to_currency;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getConvertedValue()
    {
        return $this->converted_value;
    }

    /**
     * @param mixed $converted_value
     *
     * @return self
     */
    public function setConvertedValue($converted_value)
    {
        $this->converted_value = $converted_value;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getOperationUuid()
    {
        return $this->operation_uuid;
    }

    /**
     * @param mixed $operation_uuid
     *
     * @return self
     */
    public function setOperationUuid($operation_uuid)
    {
        $this->operation_uuid = $operation_uuid;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $created_at
     *
     * @return self
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * @param mixed $updated_at
     *
     * @return self
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }
}
