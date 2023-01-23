<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Repository\ServiceEntityRepository;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nama = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $telepon = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $alamat = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $tanggal_rekrut = null;

    #[ORM\Column]
    private ?int $gaji = null;

    #[ORM\Column(nullable: true)]
    private ?int $departemen_id = null;

    #[ORM\Column]
    private ?int $role_id = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNama(): ?string
    {
        return $this->nama;
    }

    public function setNama(string $nama): self
    {
        $this->nama = $nama;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTelepon(): ?string
    {
        return $this->telepon;
    }

    public function setTelepon(string $telepon): self
    {
        $this->telepon = $telepon;

        return $this;
    }

    public function getAlamat(): ?string
    {
        return $this->alamat;
    }

    public function setAlamat(string $alamat): self
    {
        $this->alamat = $alamat;

        return $this;
    }

    public function getTanggalRekrut(): ?\DateTimeInterface
    {
        return $this->tanggal_rekrut;
    }

    public function setTanggalRekrut(\DateTimeInterface $tanggal_rekrut): self
    {
        $this->tanggal_rekrut = $tanggal_rekrut;

        return $this;
    }

    public function getGaji(): ?int
    {
        return $this->gaji;
    }

    public function setGaji(int $gaji): self
    {
        $this->gaji = $gaji;

        return $this;
    }

    public function getDepartemenId(): ?int
    {
        return $this->departemen_id;
    }

    public function setDepartemenId(?int $departemen_id): self
    {
        $this->departemen_id = $departemen_id;

        return $this;
    }

    public function getRoleId(): ?int
    {
        return $this->role_id;
    }

    public function setRoleId(int $role_id): self
    {
        $this->role_id = $role_id;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }
}
