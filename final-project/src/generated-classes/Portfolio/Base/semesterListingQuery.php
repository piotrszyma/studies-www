<?php

namespace Portfolio\Base;

use \Exception;
use \PDO;
use Portfolio\semesterListing as ChildsemesterListing;
use Portfolio\semesterListingQuery as ChildsemesterListingQuery;
use Portfolio\Map\semesterListingTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'semester_listing' table.
 *
 *
 *
 * @method     ChildsemesterListingQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildsemesterListingQuery orderBySemesterId($order = Criteria::ASC) Order by the semester_id column
 * @method     ChildsemesterListingQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildsemesterListingQuery orderByQuestions($order = Criteria::ASC) Order by the questions column
 * @method     ChildsemesterListingQuery orderByKnowledge($order = Criteria::ASC) Order by the knowledge column
 *
 * @method     ChildsemesterListingQuery groupById() Group by the id column
 * @method     ChildsemesterListingQuery groupBySemesterId() Group by the semester_id column
 * @method     ChildsemesterListingQuery groupByName() Group by the name column
 * @method     ChildsemesterListingQuery groupByQuestions() Group by the questions column
 * @method     ChildsemesterListingQuery groupByKnowledge() Group by the knowledge column
 *
 * @method     ChildsemesterListingQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildsemesterListingQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildsemesterListingQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildsemesterListingQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildsemesterListingQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildsemesterListingQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildsemesterListingQuery leftJoinSemester($relationAlias = null) Adds a LEFT JOIN clause to the query using the Semester relation
 * @method     ChildsemesterListingQuery rightJoinSemester($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Semester relation
 * @method     ChildsemesterListingQuery innerJoinSemester($relationAlias = null) Adds a INNER JOIN clause to the query using the Semester relation
 *
 * @method     ChildsemesterListingQuery joinWithSemester($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Semester relation
 *
 * @method     ChildsemesterListingQuery leftJoinWithSemester() Adds a LEFT JOIN clause and with to the query using the Semester relation
 * @method     ChildsemesterListingQuery rightJoinWithSemester() Adds a RIGHT JOIN clause and with to the query using the Semester relation
 * @method     ChildsemesterListingQuery innerJoinWithSemester() Adds a INNER JOIN clause and with to the query using the Semester relation
 *
 * @method     \Portfolio\SemesterQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildsemesterListing findOne(ConnectionInterface $con = null) Return the first ChildsemesterListing matching the query
 * @method     ChildsemesterListing findOneOrCreate(ConnectionInterface $con = null) Return the first ChildsemesterListing matching the query, or a new ChildsemesterListing object populated from the query conditions when no match is found
 *
 * @method     ChildsemesterListing findOneById(int $id) Return the first ChildsemesterListing filtered by the id column
 * @method     ChildsemesterListing findOneBySemesterId(int $semester_id) Return the first ChildsemesterListing filtered by the semester_id column
 * @method     ChildsemesterListing findOneByName(string $name) Return the first ChildsemesterListing filtered by the name column
 * @method     ChildsemesterListing findOneByQuestions(string $questions) Return the first ChildsemesterListing filtered by the questions column
 * @method     ChildsemesterListing findOneByKnowledge(string $knowledge) Return the first ChildsemesterListing filtered by the knowledge column *

 * @method     ChildsemesterListing requirePk($key, ConnectionInterface $con = null) Return the ChildsemesterListing by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildsemesterListing requireOne(ConnectionInterface $con = null) Return the first ChildsemesterListing matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildsemesterListing requireOneById(int $id) Return the first ChildsemesterListing filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildsemesterListing requireOneBySemesterId(int $semester_id) Return the first ChildsemesterListing filtered by the semester_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildsemesterListing requireOneByName(string $name) Return the first ChildsemesterListing filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildsemesterListing requireOneByQuestions(string $questions) Return the first ChildsemesterListing filtered by the questions column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildsemesterListing requireOneByKnowledge(string $knowledge) Return the first ChildsemesterListing filtered by the knowledge column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildsemesterListing[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildsemesterListing objects based on current ModelCriteria
 * @method     ChildsemesterListing[]|ObjectCollection findById(int $id) Return ChildsemesterListing objects filtered by the id column
 * @method     ChildsemesterListing[]|ObjectCollection findBySemesterId(int $semester_id) Return ChildsemesterListing objects filtered by the semester_id column
 * @method     ChildsemesterListing[]|ObjectCollection findByName(string $name) Return ChildsemesterListing objects filtered by the name column
 * @method     ChildsemesterListing[]|ObjectCollection findByQuestions(string $questions) Return ChildsemesterListing objects filtered by the questions column
 * @method     ChildsemesterListing[]|ObjectCollection findByKnowledge(string $knowledge) Return ChildsemesterListing objects filtered by the knowledge column
 * @method     ChildsemesterListing[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class semesterListingQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Portfolio\Base\semesterListingQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'portfolio', $modelName = '\\Portfolio\\semesterListing', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildsemesterListingQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildsemesterListingQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildsemesterListingQuery) {
            return $criteria;
        }
        $query = new ChildsemesterListingQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildsemesterListing|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(semesterListingTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = semesterListingTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildsemesterListing A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, semester_id, name, questions, knowledge FROM semester_listing WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildsemesterListing $obj */
            $obj = new ChildsemesterListing();
            $obj->hydrate($row);
            semesterListingTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildsemesterListing|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildsemesterListingQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(semesterListingTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildsemesterListingQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(semesterListingTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildsemesterListingQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(semesterListingTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(semesterListingTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(semesterListingTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the semester_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySemesterId(1234); // WHERE semester_id = 1234
     * $query->filterBySemesterId(array(12, 34)); // WHERE semester_id IN (12, 34)
     * $query->filterBySemesterId(array('min' => 12)); // WHERE semester_id > 12
     * </code>
     *
     * @see       filterBySemester()
     *
     * @param     mixed $semesterId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildsemesterListingQuery The current query, for fluid interface
     */
    public function filterBySemesterId($semesterId = null, $comparison = null)
    {
        if (is_array($semesterId)) {
            $useMinMax = false;
            if (isset($semesterId['min'])) {
                $this->addUsingAlias(semesterListingTableMap::COL_SEMESTER_ID, $semesterId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($semesterId['max'])) {
                $this->addUsingAlias(semesterListingTableMap::COL_SEMESTER_ID, $semesterId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(semesterListingTableMap::COL_SEMESTER_ID, $semesterId, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%', Criteria::LIKE); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildsemesterListingQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(semesterListingTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the questions column
     *
     * Example usage:
     * <code>
     * $query->filterByQuestions('fooValue');   // WHERE questions = 'fooValue'
     * $query->filterByQuestions('%fooValue%', Criteria::LIKE); // WHERE questions LIKE '%fooValue%'
     * </code>
     *
     * @param     string $questions The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildsemesterListingQuery The current query, for fluid interface
     */
    public function filterByQuestions($questions = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($questions)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(semesterListingTableMap::COL_QUESTIONS, $questions, $comparison);
    }

    /**
     * Filter the query on the knowledge column
     *
     * Example usage:
     * <code>
     * $query->filterByKnowledge('fooValue');   // WHERE knowledge = 'fooValue'
     * $query->filterByKnowledge('%fooValue%', Criteria::LIKE); // WHERE knowledge LIKE '%fooValue%'
     * </code>
     *
     * @param     string $knowledge The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildsemesterListingQuery The current query, for fluid interface
     */
    public function filterByKnowledge($knowledge = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($knowledge)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(semesterListingTableMap::COL_KNOWLEDGE, $knowledge, $comparison);
    }

    /**
     * Filter the query by a related \Portfolio\Semester object
     *
     * @param \Portfolio\Semester|ObjectCollection $semester The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildsemesterListingQuery The current query, for fluid interface
     */
    public function filterBySemester($semester, $comparison = null)
    {
        if ($semester instanceof \Portfolio\Semester) {
            return $this
                ->addUsingAlias(semesterListingTableMap::COL_SEMESTER_ID, $semester->getId(), $comparison);
        } elseif ($semester instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(semesterListingTableMap::COL_SEMESTER_ID, $semester->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterBySemester() only accepts arguments of type \Portfolio\Semester or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Semester relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildsemesterListingQuery The current query, for fluid interface
     */
    public function joinSemester($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Semester');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Semester');
        }

        return $this;
    }

    /**
     * Use the Semester relation Semester object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Portfolio\SemesterQuery A secondary query class using the current class as primary query
     */
    public function useSemesterQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSemester($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Semester', '\Portfolio\SemesterQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildsemesterListing $semesterListing Object to remove from the list of results
     *
     * @return $this|ChildsemesterListingQuery The current query, for fluid interface
     */
    public function prune($semesterListing = null)
    {
        if ($semesterListing) {
            $this->addUsingAlias(semesterListingTableMap::COL_ID, $semesterListing->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the semester_listing table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(semesterListingTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            semesterListingTableMap::clearInstancePool();
            semesterListingTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(semesterListingTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(semesterListingTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            semesterListingTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            semesterListingTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // semesterListingQuery
