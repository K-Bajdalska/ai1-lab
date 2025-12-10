<?php
namespace App\Model;

use App\Service\Config;

class Review {
    private ?int $id = null;
    private ?int $reservationNumber = null;
    private ?int $mainRating = null;
    private ?string $mainComment = null;
    private ?string $advantages  = null;
    private ?string $disadvantages = null;
    private ?int $hotelRating = null;
    private ?string $hotelComment = null;
    private ?int $locationRating = null;
    private ?string $locationComment = null;
    private ?int $valueToMoneyRating = null;
    private ?string $valueToMoneyComment = null;
    private ?bool $isRecommended = null;
    private ?string $author = null;
    private ?string $email = null;

    public function getId(): ?int
    {
        return $this->id;
    }
    public function setId(?int $id): Review
    {
        $this->id = $id;
        return $this;
    }
    public function getReservationNumber(): ?int
    {
        return $this->reservationNumber;
    }
    public function setReservationNumber(?int $resNum): Review
    {
        $this->reservationNumber = $resNum;
        return $this;
    }
    public function getMainRating(): ?int
    {
        return $this->mainRating;
    }
    public function setMainRanking(?int $rank): Review
    {
        $this->mainRating = $rank;
        return $this;
    }
    public function getMainComment(): ?string
    {
        return $this->mainComment;
    }
    public function setMainComment(?string $comment): Review
    {
        $this->mainComment = $comment;
        return $this;
    }
    public function getAdvantages(): ?string
    {
        return $this->advantages;
    }
    public function setAdvantages(?string $adv): Review
    {
        $this->advantages = $adv;
        return $this;
    }
    public function getDisadvantages(): ?string
    {
        return $this->disadvantages;
    }
    public function setDisadvantages(?string $disadv): Review
    {
        $this->disadvantages = $disadv;
        return $this;
    }
    public function getHotelRating(): ?int
    {
        return $this->hotelRating;
    }
    public function setHotelRating(?int $rank): Review
    {
        $this->hotelRating = $rank;
        return $this;
    }
    public function getHotelComment(): ?string
    {
        return $this->hotelComment;
    }
    public function setHotelComment(?string $comment): Review
    {
        $this->hotelComment = $comment;
        return $this;
    }
    public function getLocationRating(): ?int
    {
        return $this->locationRating;
    }
    public function setLocationRating(?int $rank): Review
    {
        $this->locationRating = $rank;
        return $this;
    }
    public function getLocationComment(): ?string
    {
        return $this->locationComment;
    }
    public function setLocationComment(?string $comment): Review
    {
        $this->locationComment = $comment;
        return $this;
    }
    public function getValueToMoneyRating(): ?int
    {
        return $this->valueToMoneyRating;
    }
    public function setValueToMoneyRating(?int $rank): Review
    {
        $this->valueToMoneyRating = $rank;
        return $this;
    }
    public function getValueToMoneyComment(): ?string
    {
        return $this->valueToMoneyComment;
    }
    public function setValueToMoneyComment(?string $comment): Review
    {
        $this->valueToMoneyComment = $comment;
        return $this;
    }
    public function getIsRecommended(): ?bool
    {
        return $this->isRecommended;
    }
    public function setIsRecommended(?bool $isRecommended): Review
    {
        $this->isRecommended = $isRecommended;
        return $this;
    }
    public function getAuthor(): ?string
    {
        return $this->author;
    }
    public function setAuthor(?string $author): Review
    {
        $this->author = $author;
        return $this;
    }
    public function getEmail(): ?string
    {
        return $this->email;
    }
    public function setEmail(?string $email): Review
    {
        $this->email = $email;
        return $this;
    }

    public static function fromArray($array): Review
    {
        $review = new self();
        $review->fill($array);
        return $review;
    }

    public function fill($array): Review
    {
        if (isset($array['id']) && ! $this->getId()) {
            $this->setId((int)$array['id']);
        }
        if (isset($array['reservationNumber'])) {
            $this->setReservationNumber((int)$array['reservationNumber']);
        }
        if (isset($array['mainRating'])) {
            $this->setMainRanking((int)$array['mainRating']);
        }
        if (isset($array['mainComment'])) {
            $this->setMainComment($array['mainComment']);
        }
        if (isset($array['advantages'])) {
            $this->setAdvantages($array['advantages']);
        }
        if (isset($array['disadvantages'])) {
            $this->setDisadvantages($array['disadvantages']);
        }
        if (isset($array['hotelRating'])) {
            $this->setHotelRating((int)$array['hotelRating']);
        }
        if (isset($array['hotelComment'])) {
            $this->setHotelComment($array['hotelComment']);
        }
        if (isset($array['locationRating'])) {
            $this->setLocationRating((int)$array['locationRating']);
        }
        if (isset($array['locationComment'])) {
            $this->setLocationComment($array['locationComment']);
        }
        if (isset($array['valueToMoneyRating'])) {
            $this->setValueToMoneyRating((int)$array['valueToMoneyRating']);
        }
        if (isset($array['valueToMoneyComment'])) {
            $this->setValueToMoneyComment($array['valueToMoneyComment']);
        }
        if (isset($array['isRecommended'])) {
            $this->setIsRecommended($array['isRecommended'] === 'on' || $array['isRecommended'] == 1);
        }
        if (isset($array['author'])) {
            $this->setAuthor($array['author']);
        }
        if (isset($array['email'])) {
            $this->setEmail($array['email']);
        }

        return $this;
    }
    public static function findAll(): array
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        $sql = 'SELECT * FROM review';
        $statement = $pdo->prepare($sql);
        $statement->execute();
        $reviews = [];
        $reviewsArray = $statement->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($reviewsArray as $reviewArray) {
            $reviews[] = self::fromArray($reviewArray);
        }

        return $reviews;
    }
    public static function find($id): ?Review
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        $sql = 'SELECT * FROM review WHERE id = :id';
        $statement = $pdo->prepare($sql);
        $statement->execute(['id' => $id]);

        $reviewArray = $statement->fetch(\PDO::FETCH_ASSOC);
        if (! $reviewArray) {
            return null;
        }
        $review = Review::fromArray($reviewArray);

        return $review;
    }
    public function save(): void
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        if (! $this->getId()) {
            $sql = "INSERT INTO review (reservationNumber, mainRating, mainComment, advantages, disadvantages,
                    hotelRating, hotelComment, locationRating, locationComment, valueToMoneyRating, valueToMoneyComment,
                    isRecommended, author, email) VALUES (:reservationNumber, :mainRating, :mainComment, :advantages, :disadvantages, :hotelRating,
                    :hotelComment, :locationRating, :locationComment, :valueToMoneyRating, :valueToMoneyComment, :isRecommended, :author, :email)";
            $statement = $pdo->prepare($sql);
            $statement->execute([
                'reservationNumber' => $this->getReservationNumber(),
                'mainRating' => $this->getMainRating(),
                'mainComment' => $this->getMainComment(),
                'advantages' => $this->getAdvantages(),
                'disadvantages' => $this->getDisadvantages(),
                'hotelRating' => $this->getHotelRating(),
                'hotelComment' => $this->getHotelComment(),
                'locationRating' => $this->getLocationRating(),
                'locationComment' => $this->getLocationComment(),
                'valueToMoneyRating' => $this->getValueToMoneyRating(),
                'valueToMoneyComment' => $this->getValueToMoneyComment(),
                'isRecommended' => $this->getIsRecommended(),
                'author' => $this->getAuthor(),
                'email' => $this->getEmail(),
            ]);

            $this->setId($pdo->lastInsertId());
        } else {
            $sql = "UPDATE review SET reservationNumber = :reservationNumber, mainRating = :mainRating, mainComment = :mainComment,
                  advantages = :advantages, disadvantages= :disadvantages, hotelRating = :hotelRating, hotelComment =:hotelComment,
                  locationRating = :locationRating, locationComment= :locationComment, valueToMoneyRating = :valueToMoneyRating,
                  valueToMoneyComment = :valueToMoneyComment, isRecommended = :isRecommended, author = :author, email = :email WHERE id = :id";
            $statement = $pdo->prepare($sql);
            $statement->execute([
                ':reservationNumber' => $this->getReservationNumber(),
                ':mainRating' => $this->getMainRating(),
                ':mainComment' => $this->getMainComment(),
                ':advantages' => $this->getAdvantages(),
                ':disadvantages' => $this->getDisadvantages(),
                ':hotelRating' => $this->getHotelRating(),
                ':hotelComment' => $this->getHotelComment(),
                ':locationRating' => $this->getLocationRating(),
                ':locationComment' => $this->getLocationComment(),
                ':valueToMoneyRating' => $this->getValueToMoneyRating(),
                ':valueToMoneyComment' => $this->getValueToMoneyComment(),
                ':isRecommended' => $this->getIsRecommended(),
                ':author' => $this->getAuthor(),
                ':email' => $this->getEmail(),
                ':id' => $this->getId(),
            ]);
        }
    }

    public function delete(): void
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        $sql = "DELETE FROM review WHERE id = :id";
        $statement = $pdo->prepare($sql);
        $statement->execute([
            ':id' => $this->getId(),
        ]);

        $this->setId(null);
        $this->setReservationNumber(null);
        $this->setMainRanking(null);
        $this->setMainComment(null);
        $this->setAdvantages(null);
        $this->setDisadvantages(null);
        $this->setHotelRating(null);
        $this->setHotelComment(null);
        $this->setLocationRating(null);
        $this->setLocationComment(null);
        $this->setValueToMoneyRating(null);
        $this->setValueToMoneyComment(null);
        $this->setIsRecommended(null);
        $this->setAuthor(null);
        $this->setEmail(null);
    }
}

