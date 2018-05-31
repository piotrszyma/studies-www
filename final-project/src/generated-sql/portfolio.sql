
BEGIN;

-----------------------------------------------------------------------
-- hobby
-----------------------------------------------------------------------

DROP TABLE IF EXISTS "hobby" CASCADE;

CREATE TABLE "hobby"
(
    "id" serial NOT NULL,
    "name" VARCHAR(4096) NOT NULL,
    "title" VARCHAR(4096) NOT NULL,
    "description" VARCHAR(4096) NOT NULL,
    PRIMARY KEY ("id")
);

-----------------------------------------------------------------------
-- hobby_item
-----------------------------------------------------------------------

DROP TABLE IF EXISTS "hobby_item" CASCADE;

CREATE TABLE "hobby_item"
(
    "id" serial NOT NULL,
    "hobby_id" INTEGER,
    "year" INTEGER NOT NULL,
    "footer" VARCHAR(4096) NOT NULL,
    "description" VARCHAR(4096) NOT NULL,
    PRIMARY KEY ("id")
);

-----------------------------------------------------------------------
-- semester
-----------------------------------------------------------------------

DROP TABLE IF EXISTS "semester" CASCADE;

CREATE TABLE "semester"
(
    "id" serial NOT NULL,
    "about" VARCHAR(4096) NOT NULL,
    PRIMARY KEY ("id")
);

-----------------------------------------------------------------------
-- semester_item
-----------------------------------------------------------------------

DROP TABLE IF EXISTS "semester_item" CASCADE;

CREATE TABLE "semester_item"
(
    "id" serial NOT NULL,
    "semester_id" INTEGER,
    "name" VARCHAR(4096) NOT NULL,
    "questions" VARCHAR(4096) NOT NULL,
    "knowledge" VARCHAR(4096) NOT NULL,
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

ALTER TABLE "hobby_item" ADD CONSTRAINT "hobby_item_fk_fd3442"
    FOREIGN KEY ("hobby_id")
    REFERENCES "hobby" ("id");

ALTER TABLE "semester_item" ADD CONSTRAINT "semester_item_fk_d756b7"
    FOREIGN KEY ("semester_id")
    REFERENCES "semester" ("id");

COMMIT;
