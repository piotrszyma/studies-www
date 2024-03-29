<?php

namespace Portfolio\Base;

use \Exception;
use \PDO;
use Portfolio\Hobby as ChildHobby;
use Portfolio\HobbyQuery as ChildHobbyQuery;
use Portfolio\Map\HobbyTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'hobby' table.
 *
 *
 *
 * @method     ChildHobbyQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildHobbyQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildHobbyQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildHobbyQuery orderByDescription($order = Criteria::ASC) Order by the description column
 *
 * @method     ChildHobbyQuery groupById() Group by the id column
 * @method     ChildHobbyQuery groupByName() Group by the name column
 * @method     ChildHobbyQuery groupByTitle() Group by the title column
 * @method     ChildHobbyQuery groupByDescription() Group by the description column
 *
 * @method     ChildHobbyQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildHobbyQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildHobbyQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildHobbyQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildHobbyQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildHobbyQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildHobbyQuery leftJoinHobbyItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the HobbyItem relation
 * @method     ChildHobbyQuery rightJoinHobbyItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HobbyItem relation
 * @method     ChildHobbyQuery innerJoinHobbyItem($relationAlias = null) Adds a INNER JOIN clause to the query using the HobbyItem relation
 *
 * @method     ChildHobbyQuery joinWithHobbyItem($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HobbyItem relation
 *
 * @method     ChildHobbyQuery leftJoinWithHobbyItem() Adds a LEFT JOIN clause and with to the query using the HobbyItem relation
 * @method     ChildHobbyQuery rightJoinWithHobbyItem() Adds a RIGHT JOIN clause and with to the query using the HobbyItem relation
 * @method     ChildHobbyQuery innerJoinWithHobbyItem() Adds a INNER JOIN clause and with to the query using the HobbyItem relation
 *
 * @method     \Portfolio\HobbyItemQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildHobby findOne(ConnectionInterface $con = null) Return the first ChildHobby matching the query
 * @method     ChildHobby findOneOrCreate(ConnectionInterface $con = null) Return the first ChildHobby matching the query, or a new ChildHobby object populated from the query conditions when no match is found
 *
 * @method     ChildHobby findOneById(int $id) Return the first ChildHobby filtered by the id column
 * @method     ChildHobby findOneByName(string $name) Return the first ChildHobby filtered by the name column
 * @method     ChildHobby findOneByTitle(string $title) Return the first ChildHobby filtered by the title column
 * @method     ChildHobby findOneByDescription(string $description) Return the first ChildHobby filtered by the description column *

 * @method     ChildHobby requirePk($key, ConnectionInterface $con = null) Return the ChildHobby by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHobby requireOne(ConnectionInterface $con = null) Return the first ChildHobby matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildHobby requireOneById(int $id) Return the first ChildHobby filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHobby requireOneByName(string $name) Return the first ChildHobby filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHobby requireOneByTitle(string $title) Return the first ChildHobby filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHobby requireOneByDescription(string $description) Return the first ChildHobby filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildHobby[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildHobby objects based on current ModelCriteria
 * @method     ChildHobby[]|ObjectCollection findById(int $id) Return ChildHobby objects filtered by the id column
 * @method     ChildHobby[]|ObjectCollection findByName(string $name) Return ChildHobby objects filtered by the name column
 * @method     ChildHobby[]|ObjectCollection findByTitle(string $title) Return ChildHobby objects filtered by the title column
 * @method     ChildHobby[]|ObjectCollection findByDescription(string $description) Return ChildHobby objects filtered by the description column
 * @method     ChildHobby[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class HobbyQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Portfolio\Base\HobbyQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'portfolio', $modelName = '\\Portfolio\\Hobby', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildHobbyQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildHobbyQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildHobbyQuery) {
            return $criteria;
        }
        $query = new ChildHobbyQuery();
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
     * @return ChildHobby|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(HobbyTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = HobbyTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildHobby A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, name, title, description FROM hobby WHERE id = :p0';
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
            /** @var ChildHobby $obj */
            $obj = new ChildHobby();
            $obj->hydrate($row);
            HobbyTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildHobby|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildHobbyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(HobbyTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildHobbyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(HobbyTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildHobbyQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(HobbyTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(HobbyTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HobbyTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildHobbyQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HobbyTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%', Criteria::LIKE); // WHERE title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $title The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHobbyQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HobbyTableMap::COL_TITLE, $title, $comparison);
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
     * @return $this|ChildHobbyQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HobbyTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query by a related \Portfolio\HobbyItem object
     *
     * @param \Portfolio\HobbyItem|ObjectCollection $hobbyItem the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildHobbyQuery The current query, for fluid interface
     */
    public function filterByHobbyItem($hobbyItem, $comparison = null)
    {
        if ($hobbyItem instanceof \Portfolio\HobbyItem) {
            return $this
                ->addUsingAlias(HobbyTableMap::COL_ID, $hobbyItem->getHobbyId(), $comparison);
        } elseif ($hobbyItem instanceof ObjectCollection) {
            return $this
                ->useHobbyItemQuery()
                ->filterByPrimaryKeys($hobbyItem->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHobbyItem() only accepts arguments of type \Portfolio\HobbyItem or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HobbyItem relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildHobbyQuery The current query, for fluid interface
     */
    public function joinHobbyItem($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HobbyItem');

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
            $this->addJoinObject($join, 'HobbyItem');
        }

        return $this;
    }

    /**
     * Use the HobbyItem relation HobbyItem object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Portfolio\HobbyItemQuery A secondary query class using the current class as primary query
     */
    public function useHobbyItemQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinHobbyItem($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HobbyItem', '\Portfolio\HobbyItemQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildHobby $hobby Object to remove from the list of results
     *
     * @return $this|ChildHobbyQuery The current query, for fluid interface
     */
    public function prune($hobby = null)
    {
        if ($hobby) {
            $this->addUsingAlias(HobbyTableMap::COL_ID, $hobby->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the hobby table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(HobbyTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            HobbyTableMap::clearInstancePool();
            HobbyTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(HobbyTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(HobbyTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            HobbyTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            HobbyTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // HobbyQuery
