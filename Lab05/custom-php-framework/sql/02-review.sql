create table review
(
    id      integer not null
        constraint post_pk
            primary key autoincrement,
    reservationNumber integer not null,
    mainRating integer not null,
    mainComment text not null,
    advantages text,
    disadvantages text,
    hotelRating integer not null,
    hotelComment text,
    locationRating integer not null,
    locationComment text,
    valueToMoneyRating integer not null,
    valueToMoneyComment text,
    isRecommended boolean not null,
    author text not null,
    email text not null
);