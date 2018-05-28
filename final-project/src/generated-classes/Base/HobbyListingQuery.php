<?php

namespace Base;

use \HobbyListing as ChildHobbyListing;
use \HobbyListingQuery as ChildHobbyListingQuery;
use \Exception;
use \PDO;
use Map\HobbyListingTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'hobby_listing' table.
 *
 *
 *
 * @method     ChildHobbyListingQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildHobbyListingQuery orderByHobbyId($order = Criteria::ASC) Order by the hobby_id column
 * @method     ChildHobbyListingQuery orderByYear($order = Criteria::ASC) Order by the year column
 * @method     ChildHobbyListingQuery orderByFooter($order = Criteria::ASC) Order by the footer column
 * @method     ChildHobbyListingQuery orderByDescription($order = Criteria::ASC) Order by the description column
 *
 * @method     ChildHobbyListingQuery groupById() Group by the id column
 * @method     ChildHobbyListingQuery groupByHobbyId() Group by the hobby_id column
 * @method     ChildHobbyListingQuery groupByYear() Group by the year column
 * @method     ChildHobbyListingQuery groupByFooter() Group by the footer column
 * @method     ChildHobbyListingQuery groupByDescription() Group by the description column
 *
 * @method     ChildHobbyListingQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildHobbyListingQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildHobbyListingQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildHobbyListingQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildHobbyListingQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildHobbyListingQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildHobbyListingQuery leftJoinHobby($relationAlias = null) Adds a LEFT JOIN clause to the query using the Hobby relation
 * @method     ChildHobbyListingQuery rightJoinHobby($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Hobby relation
 * @method     ChildHobbyListingQuery innerJoinHobby($relationAlias = null) Adds a INNER JOIN clause to the query using the Hobby relation
 *
 * @method     ChildHobbyListingQuery joinWithHobby($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Hobby relation
 *
 * @method     ChildHobbyListingQuery leftJoinWithHobby() Adds a LEFT JOIN clause and with to the query using the Hobby relation
 * @method     ChildHobbyListingQuery rightJoinWithHobby() Adds a RIGHT JOIN clause and with to the query using the Hobby relation
 * @method     ChildHobbyListingQuery innerJoinWithHobby() Adds a INNER JOIN clause and with to the query using the Hobby relation
 *
 * @method     \HobbyQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildHobbyListing findOne(ConnectionInterface $con = null) Return the first ChildHobbyListing matching the query
 * @method     ChildHobbyListing findOneOrCreate(ConnectionInterface $con = null) Return the first ChildHobbyListing matching the query, or a new ChildHobbyListing object populated from the query conditions when no match is found
 *
 * @method     ChildHobbyListing findOneById(int $id) Return the first ChildHobbyListing filtered by the id column
 * @method     ChildHobbyListing findOneByHobbyId(int $hobby_id) Return the first ChildHobbyListing filtered by the hobby_id column
 * @method     ChildHobbyListing findOneByYear(int $year) Return the first ChildHobbyListing filtered by the year column
 * @method     ChildHobbyListing findOneByFooter(string $footer) Return the first ChildHobbyListing filtered by the footer column
 * @method     ChildHobbyListing findOneByDescription(string $description) Return the first ChildHobbyListing filtered by the description column *

 * @method     ChildHobbyListing requirePk($key, ConnectionInterface $con = null) Return the ChildHobbyListing by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHobbyListing requireOne(ConnectionInterface $con = null) Return the first ChildHobbyListing matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildHobbyListing requireOneById(int $id) Return the first ChildHobbyListing filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHobbyListing requireOneByHobbyId(int $hobby_id) Return the first ChildHobbyListing filtered by the hobby_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHobbyListing requireOneByYear(int $year) Return the first ChildHobbyListing filtered by the year column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHobbyListing requireOneByFooter(string $footer) Return the first ChildHobbyListing filtered by the footer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHobbyListing requireOneByDescription(string $description) Return the first ChildHobbyListing filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildHobbyListing[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildHobbyListing objects based on current ModelCriteria
 * @method     ChildHobbyListing[]|ObjectCollection findById(int $id) Return ChildHobbyListing objects filtered by the id column
 * @method     ChildHobbyListing[]|ObjectCollection findByHobbyId(int $hobby_id) Return ChildHobbyListing objects filtered by the hobby_id column
 * @method     ChildHobbyListing[]|ObjectCollection findByYear(int $year) Return ChildHobbyListing objects filtered by the year column
 * @method     ChildHobbyListing[]|ObjectCollection findByFooter(string $footer) Return ChildHobbyListing objects filtered by the footer column
 * @method     ChildHobbyListing[]|ObjectCollection findByDescription(string $description) Return ChildHobbyListing objects filtered by the description column
 * @method     ChildHobbyListing[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class HobbyListingQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\HobbyListingQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'portfolio', $modelName = '\\HobbyListing', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildHobbyListingQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildHobbyListingQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildHobbyListingQuery) {
            return $criteria;
        }
        $query = new ChildHobbyListingQuery();
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
     * @return ChildHobbyListing|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(HobbyListingTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = HobbyListingTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildHobbyListing A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, hobby_id, year, footer, description FROM hobby_listing WHERE id = :p0';
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
            /** @var ChildHobbyListing $obj */
            $obj = new ChildHobbyListing();
            $obj->hydrate($row);
            HobbyListingTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildHobbyListing|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildHobbyListingQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(HobbyListingTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildHobbyListingQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(HobbyListingTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildHobbyListingQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(HobbyListingTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(HobbyListingTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HobbyListingTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the hobby_id column
     *
     * Example usage:
     * <code>
     * $query->filterByHobbyId(1234); // WHERE hobby_id = 1234
     * $query->filterByHobbyId(array(12, 34)); // WHERE hobby_id IN (12, 34)
     * $query->filterByHobbyId(array('min' => 12)); // WHERE hobby_id > 12
     * </code>
     *
     * @see       filterByHobby()
     *
     * @param     mixed $hobbyId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHobbyListingQuery The current query, for fluid interface
     */
    public function filterByHobbyId($hobbyId = null, $comparison = null)
    {
        if (is_array($hobbyId)) {
            $useMinMax = false;
            if (isset($hobbyId['min'])) {
                $this->addUsingAlias(HobbyListingTableMap::COL_HOBBY_ID, $hobbyId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($hobbyId['max'])) {
                $this->addUsingAlias(HobbyListingTableMap::COL_HOBBY_ID, $hobbyId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HobbyListingTableMap::COL_HOBBY_ID, $hobbyId, $comparison);
    }

    /**
     * Filter the query on the year column
     *
     * Example usage:
     * <code>
     * $query->filterByYear(1234); // WHERE year = 1234
     * $query->filterByYear(array(12, 34)); // WHERE year IN (12, 34)
     * $query->filterByYear(array('min' => 12)); // WHERE year > 12
     * </code>
     *
     * @param     mixed $year The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHobbyListingQuery The current query, for fluid interface
     */
    public function filterByYear($year = null, $comparison = null)
    {
        if (is_array($year)) {
            $useMinMax = false;
            if (isset($year['min'])) {
                $this->addUsingAlias(HobbyListingTableMap::COL_YEAR, $year['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($year['max'])) {
                $this->addUsingAlias(HobbyListingTableMap::COL_YEAR, $year['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HobbyListingTableMap::COL_YEAR, $year, $comparison);
    }

    /**
     * Filter the query on the footer column
     *
     * Example usage:
     * <code>
     * $query->filterByFooter('fooValue');   // WHERE footer = 'fooValue'
     * $query->filterByFooter('%fooValue%', Criteria::LIKE); // WHERE footer LIKE '%fooValue%'
     * </code>
     *
     * @param     string $footer The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHobbyListingQuery The current query, for fluid interface
     */
    public function filterByFooter($footer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($footer)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HobbyListingTableMap::COL_FOOTER, $footer, $comparison);
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%', Criteria::LIKE); // WHERE description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHobbyListingQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HobbyListingTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query by a related \Hobby object
     *
     * @param \Hobby|ObjectCollection $hobby The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildHobbyListingQuery The current query, for fluid interface
     */
    public function filterByHobby($hobby, $comparison = null)
    {
        if ($hobby instanceof \Hobby) {
            return $this
                ->addUsingAlias(HobbyListingTableMap::COL_HOBBY_ID, $hobby->getId(), $comparison);
        } elseif ($hobby instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HobbyListingTableMap::COL_HOBBY_ID, $hobby->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByHobby() only accepts arguments of type \Hobby or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Hobby relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildHobbyListingQuery The current query, for fluid interface
     */
    public function joinHobby($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Hobby');

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
            $this->addJoinObject($join, 'Hobby');
        }

        return $this;
    }

    /**
     * Use the Hobby relation Hobby object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HobbyQuery A secondary query class using the current class as primary query
     */
    public function useHobbyQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinHobby($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Hobby', '\HobbyQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildHobbyListing $hobbyListing Object to remove from the list of results
     *
     * @return $this|ChildHobbyListingQuery The current query, for fluid interface
     */
    public function prune($hobbyListing = null)
    {
        if ($hobbyListing) {
            $this->addUsingAlias(HobbyListingTableMap::COL_ID, $hobbyListing->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the hobby_listing table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(HobbyListingTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            HobbyListingTableMap::clearInstancePool();
            HobbyListingTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(HobbyListingTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(HobbyListingTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            HobbyListingTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            HobbyListingTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // HobbyListingQuery
