<?php

namespace Portfolio\Base;

use \Exception;
use \PDO;
use Portfolio\Semester as ChildSemester;
use Portfolio\SemesterQuery as ChildSemesterQuery;
use Portfolio\Map\SemesterTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'semester' table.
 *
 *
 *
 * @method     ChildSemesterQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildSemesterQuery orderByAbout($order = Criteria::ASC) Order by the about column
 *
 * @method     ChildSemesterQuery groupById() Group by the id column
 * @method     ChildSemesterQuery groupByAbout() Group by the about column
 *
 * @method     ChildSemesterQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSemesterQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSemesterQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSemesterQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildSemesterQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildSemesterQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildSemesterQuery leftJoinsemesterListing($relationAlias = null) Adds a LEFT JOIN clause to the query using the semesterListing relation
 * @method     ChildSemesterQuery rightJoinsemesterListing($relationAlias = null) Adds a RIGHT JOIN clause to the query using the semesterListing relation
 * @method     ChildSemesterQuery innerJoinsemesterListing($relationAlias = null) Adds a INNER JOIN clause to the query using the semesterListing relation
 *
 * @method     ChildSemesterQuery joinWithsemesterListing($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the semesterListing relation
 *
 * @method     ChildSemesterQuery leftJoinWithsemesterListing() Adds a LEFT JOIN clause and with to the query using the semesterListing relation
 * @method     ChildSemesterQuery rightJoinWithsemesterListing() Adds a RIGHT JOIN clause and with to the query using the semesterListing relation
 * @method     ChildSemesterQuery innerJoinWithsemesterListing() Adds a INNER JOIN clause and with to the query using the semesterListing relation
 *
 * @method     \Portfolio\semesterListingQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSemester findOne(ConnectionInterface $con = null) Return the first ChildSemester matching the query
 * @method     ChildSemester findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSemester matching the query, or a new ChildSemester object populated from the query conditions when no match is found
 *
 * @method     ChildSemester findOneById(int $id) Return the first ChildSemester filtered by the id column
 * @method     ChildSemester findOneByAbout(string $about) Return the first ChildSemester filtered by the about column *

 * @method     ChildSemester requirePk($key, ConnectionInterface $con = null) Return the ChildSemester by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSemester requireOne(ConnectionInterface $con = null) Return the first ChildSemester matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSemester requireOneById(int $id) Return the first ChildSemester filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSemester requireOneByAbout(string $about) Return the first ChildSemester filtered by the about column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSemester[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSemester objects based on current ModelCriteria
 * @method     ChildSemester[]|ObjectCollection findById(int $id) Return ChildSemester objects filtered by the id column
 * @method     ChildSemester[]|ObjectCollection findByAbout(string $about) Return ChildSemester objects filtered by the about column
 * @method     ChildSemester[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SemesterQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Portfolio\Base\SemesterQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'portfolio', $modelName = '\\Portfolio\\Semester', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSemesterQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSemesterQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSemesterQuery) {
            return $criteria;
        }
        $query = new ChildSemesterQuery();
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
     * @return ChildSemester|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SemesterTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = SemesterTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildSemester A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, about FROM semester WHERE id = :p0';
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
            /** @var ChildSemester $obj */
            $obj = new ChildSemester();
            $obj->hydrate($row);
            SemesterTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildSemester|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSemesterQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SemesterTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSemesterQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SemesterTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildSemesterQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(SemesterTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(SemesterTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SemesterTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the about column
     *
     * Example usage:
     * <code>
     * $query->filterByAbout('fooValue');   // WHERE about = 'fooValue'
     * $query->filterByAbout('%fooValue%', Criteria::LIKE); // WHERE about LIKE '%fooValue%'
     * </code>
     *
     * @param     string $about The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSemesterQuery The current query, for fluid interface
     */
    public function filterByAbout($about = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($about)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SemesterTableMap::COL_ABOUT, $about, $comparison);
    }

    /**
     * Filter the query by a related \Portfolio\semesterListing object
     *
     * @param \Portfolio\semesterListing|ObjectCollection $semesterListing the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSemesterQuery The current query, for fluid interface
     */
    public function filterBysemesterListing($semesterListing, $comparison = null)
    {
        if ($semesterListing instanceof \Portfolio\semesterListing) {
            return $this
                ->addUsingAlias(SemesterTableMap::COL_ID, $semesterListing->getSemesterId(), $comparison);
        } elseif ($semesterListing instanceof ObjectCollection) {
            return $this
                ->usesemesterListingQuery()
                ->filterByPrimaryKeys($semesterListing->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBysemesterListing() only accepts arguments of type \Portfolio\semesterListing or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the semesterListing relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSemesterQuery The current query, for fluid interface
     */
    public function joinsemesterListing($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('semesterListing');

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
            $this->addJoinObject($join, 'semesterListing');
        }

        return $this;
    }

    /**
     * Use the semesterListing relation semesterListing object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Portfolio\semesterListingQuery A secondary query class using the current class as primary query
     */
    public function usesemesterListingQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinsemesterListing($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'semesterListing', '\Portfolio\semesterListingQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSemester $semester Object to remove from the list of results
     *
     * @return $this|ChildSemesterQuery The current query, for fluid interface
     */
    public function prune($semester = null)
    {
        if ($semester) {
            $this->addUsingAlias(SemesterTableMap::COL_ID, $semester->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the semester table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SemesterTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SemesterTableMap::clearInstancePool();
            SemesterTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SemesterTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SemesterTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SemesterTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SemesterTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SemesterQuery
