
BEGIN;

-----------------------------------------------------------------------
-- hobby
-----------------------------------------------------------------------

DROP TABLE IF EXISTS "hobby" CASCADE;

CREATE TABLE "hobby"
(
    "id" serial NOT NULL,
    "title" VARCHAR(128) NOT NULL,
    "description" VARCHAR(128) NOT NULL,
    PRIMARY KEY ("id")
);

-----------------------------------------------------------------------
-- hobby_listing
-----------------------------------------------------------------------

DROP TABLE IF EXISTS "hobby_listing" CASCADE;

CREATE TABLE "hobby_listing"
(
    "id" serial NOT NULL,
    "hobby_id" INTEGER,
    "year" INTEGER NOT NULL,
    "footer" VARCHAR(128) NOT NULL,
    "description" VARCHAR(128) NOT NULL,
    PRIMARY KEY ("id")
);

-----------------------------------------------------------------------
-- semester
-----------------------------------------------------------------------

DROP TABLE IF EXISTS "semester" CASCADE;

CREATE TABLE "semester"
(
    "id" serial NOT NULL,
    "about" VARCHAR(128) NOT NULL,
    PRIMARY KEY ("id")
);

-----------------------------------------------------------------------
-- semester_listing
-----------------------------------------------------------------------

DROP TABLE IF EXISTS "semester_listing" CASCADE;

CREATE TABLE "semester_listing"
(
    "id" serial NOT NULL,
    "semester_id" INTEGER,
    "name" VARCHAR(128) NOT NULL,
    "questions" VARCHAR(128) NOT NULL,
    "knowledge" VARCHAR(128) NOT NULL,
    PRIMARY KEY ("id")
);

-----------------------------------------------------------------------
-- opinion
-----------------------------------------------------------------------

DROP TABLE IF EXISTS "opinion" CASCADE;

CREATE TABLE "opinion"
(
    "id" serial NOT NULL,
    "author" VARCHAR(256) NOT NULL,
    "comment" VARCHAR(1024) NOT NULL,
    PRIMARY KEY ("id")
);

ALTER TABLE "hobby_listing" ADD CONSTRAINT "hobby_listing_fk_fd3442"
    FOREIGN KEY ("hobby_id")
    REFERENCES "hobby" ("id");

ALTER TABLE "semester_listing" ADD CONSTRAINT "semester_listing_fk_d756b7"
    FOREIGN KEY ("semester_id")
    REFERENCES "semester" ("id");

COMMIT;
