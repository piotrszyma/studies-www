<?php

namespace Portfolio\Base;

use \Exception;
use \PDO;
use Portfolio\Opinion as ChildOpinion;
use Portfolio\OpinionQuery as ChildOpinionQuery;
use Portfolio\Map\OpinionTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'opinion' table.
 *
 *
 *
 * @method     ChildOpinionQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildOpinionQuery orderBySemesterItemId($order = Criteria::ASC) Order by the semester_item_id column
 * @method     ChildOpinionQuery orderByAuthor($order = Criteria::ASC) Order by the author column
 * @method     ChildOpinionQuery orderByComment($order = Criteria::ASC) Order by the comment column
 * @method     ChildOpinionQuery orderByCreated($order = Criteria::ASC) Order by the created column
 *
 * @method     ChildOpinionQuery groupById() Group by the id column
 * @method     ChildOpinionQuery groupBySemesterItemId() Group by the semester_item_id column
 * @method     ChildOpinionQuery groupByAuthor() Group by the author column
 * @method     ChildOpinionQuery groupByComment() Group by the comment column
 * @method     ChildOpinionQuery groupByCreated() Group by the created column
 *
 * @method     ChildOpinionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOpinionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOpinionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOpinionQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOpinionQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOpinionQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOpinionQuery leftJoinSemesterItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the SemesterItem relation
 * @method     ChildOpinionQuery rightJoinSemesterItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SemesterItem relation
 * @method     ChildOpinionQuery innerJoinSemesterItem($relationAlias = null) Adds a INNER JOIN clause to the query using the SemesterItem relation
 *
 * @method     ChildOpinionQuery joinWithSemesterItem($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the SemesterItem relation
 *
 * @method     ChildOpinionQuery leftJoinWithSemesterItem() Adds a LEFT JOIN clause and with to the query using the SemesterItem relation
 * @method     ChildOpinionQuery rightJoinWithSemesterItem() Adds a RIGHT JOIN clause and with to the query using the SemesterItem relation
 * @method     ChildOpinionQuery innerJoinWithSemesterItem() Adds a INNER JOIN clause and with to the query using the SemesterItem relation
 *
 * @method     \Portfolio\SemesterItemQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildOpinion findOne(ConnectionInterface $con = null) Return the first ChildOpinion matching the query
 * @method     ChildOpinion findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOpinion matching the query, or a new ChildOpinion object populated from the query conditions when no match is found
 *
 * @method     ChildOpinion findOneById(int $id) Return the first ChildOpinion filtered by the id column
 * @method     ChildOpinion findOneBySemesterItemId(int $semester_item_id) Return the first ChildOpinion filtered by the semester_item_id column
 * @method     ChildOpinion findOneByAuthor(string $author) Return the first ChildOpinion filtered by the author column
 * @method     ChildOpinion findOneByComment(string $comment) Return the first ChildOpinion filtered by the comment column
 * @method     ChildOpinion findOneByCreated(string $created) Return the first ChildOpinion filtered by the created column *

 * @method     ChildOpinion requirePk($key, ConnectionInterface $con = null) Return the ChildOpinion by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOpinion requireOne(ConnectionInterface $con = null) Return the first ChildOpinion matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOpinion requireOneById(int $id) Return the first ChildOpinion filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOpinion requireOneBySemesterItemId(int $semester_item_id) Return the first ChildOpinion filtered by the semester_item_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOpinion requireOneByAuthor(string $author) Return the first ChildOpinion filtered by the author column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOpinion requireOneByComment(string $comment) Return the first ChildOpinion filtered by the comment column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOpinion requireOneByCreated(string $created) Return the first ChildOpinion filtered by the created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOpinion[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOpinion objects based on current ModelCriteria
 * @method     ChildOpinion[]|ObjectCollection findById(int $id) Return ChildOpinion objects filtered by the id column
 * @method     ChildOpinion[]|ObjectCollection findBySemesterItemId(int $semester_item_id) Return ChildOpinion objects filtered by the semester_item_id column
 * @method     ChildOpinion[]|ObjectCollection findByAuthor(string $author) Return ChildOpinion objects filtered by the author column
 * @method     ChildOpinion[]|ObjectCollection findByComment(string $comment) Return ChildOpinion objects filtered by the comment column
 * @method     ChildOpinion[]|ObjectCollection findByCreated(string $created) Return ChildOpinion objects filtered by the created column
 * @method     ChildOpinion[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OpinionQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Portfolio\Base\OpinionQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'portfolio', $modelName = '\\Portfolio\\Opinion', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOpinionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOpinionQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOpinionQuery) {
            return $criteria;
        }
        $query = new ChildOpinionQuery();
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
     * @return ChildOpinion|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OpinionTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OpinionTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOpinion A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, semester_item_id, author, comment, created FROM opinion WHERE id = :p0';
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
            /** @var ChildOpinion $obj */
            $obj = new ChildOpinion();
            $obj->hydrate($row);
            OpinionTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOpinion|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOpinionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OpinionTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOpinionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OpinionTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildOpinionQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(OpinionTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(OpinionTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OpinionTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the semester_item_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySemesterItemId(1234); // WHERE semester_item_id = 1234
     * $query->filterBySemesterItemId(array(12, 34)); // WHERE semester_item_id IN (12, 34)
     * $query->filterBySemesterItemId(array('min' => 12)); // WHERE semester_item_id > 12
     * </code>
     *
     * @see       filterBySemesterItem()
     *
     * @param     mixed $semesterItemId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOpinionQuery The current query, for fluid interface
     */
    public function filterBySemesterItemId($semesterItemId = null, $comparison = null)
    {
        if (is_array($semesterItemId)) {
            $useMinMax = false;
            if (isset($semesterItemId['min'])) {
                $this->addUsingAlias(OpinionTableMap::COL_SEMESTER_ITEM_ID, $semesterItemId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($semesterItemId['max'])) {
                $this->addUsingAlias(OpinionTableMap::COL_SEMESTER_ITEM_ID, $semesterItemId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OpinionTableMap::COL_SEMESTER_ITEM_ID, $semesterItemId, $comparison);
    }

    /**
     * Filter the query on the author column
     *
     * Example usage:
     * <code>
     * $query->filterByAuthor('fooValue');   // WHERE author = 'fooValue'
     * $query->filterByAuthor('%fooValue%', Criteria::LIKE); // WHERE author LIKE '%fooValue%'
     * </code>
     *
     * @param     string $author The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOpinionQuery The current query, for fluid interface
     */
    public function filterByAuthor($author = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($author)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OpinionTableMap::COL_AUTHOR, $author, $comparison);
    }

    /**
     * Filter the query on the comment column
     *
     * Example usage:
     * <code>
     * $query->filterByComment('fooValue');   // WHERE comment = 'fooValue'
     * $query->filterByComment('%fooValue%', Criteria::LIKE); // WHERE comment LIKE '%fooValue%'
     * </code>
     *
     * @param     string $comment The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOpinionQuery The current query, for fluid interface
     */
    public function filterByComment($comment = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($comment)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OpinionTableMap::COL_COMMENT, $comment, $comparison);
    }

    /**
     * Filter the query on the created column
     *
     * Example usage:
     * <code>
     * $query->filterByCreated('2011-03-14'); // WHERE created = '2011-03-14'
     * $query->filterByCreated('now'); // WHERE created = '2011-03-14'
     * $query->filterByCreated(array('max' => 'yesterday')); // WHERE created > '2011-03-13'
     * </code>
     *
     * @param     mixed $created The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOpinionQuery The current query, for fluid interface
     */
    public function filterByCreated($created = null, $comparison = null)
    {
        if (is_array($created)) {
            $useMinMax = false;
            if (isset($created['min'])) {
                $this->addUsingAlias(OpinionTableMap::COL_CREATED, $created['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($created['max'])) {
                $this->addUsingAlias(OpinionTableMap::COL_CREATED, $created['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OpinionTableMap::COL_CREATED, $created, $comparison);
    }

    /**
     * Filter the query by a related \Portfolio\SemesterItem object
     *
     * @param \Portfolio\SemesterItem|ObjectCollection $semesterItem The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildOpinionQuery The current query, for fluid interface
     */
    public function filterBySemesterItem($semesterItem, $comparison = null)
    {
        if ($semesterItem instanceof \Portfolio\SemesterItem) {
            return $this
                ->addUsingAlias(OpinionTableMap::COL_SEMESTER_ITEM_ID, $semesterItem->getId(), $comparison);
        } elseif ($semesterItem instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(OpinionTableMap::COL_SEMESTER_ITEM_ID, $semesterItem->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterBySemesterItem() only accepts arguments of type \Portfolio\SemesterItem or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SemesterItem relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildOpinionQuery The current query, for fluid interface
     */
    public function joinSemesterItem($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SemesterItem');

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
            $this->addJoinObject($join, 'SemesterItem');
        }

        return $this;
    }

    /**
     * Use the SemesterItem relation SemesterItem object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Portfolio\SemesterItemQuery A secondary query class using the current class as primary query
     */
    public function useSemesterItemQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSemesterItem($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SemesterItem', '\Portfolio\SemesterItemQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOpinion $opinion Object to remove from the list of results
     *
     * @return $this|ChildOpinionQuery The current query, for fluid interface
     */
    public function prune($opinion = null)
    {
        if ($opinion) {
            $this->addUsingAlias(OpinionTableMap::COL_ID, $opinion->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the opinion table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OpinionTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OpinionTableMap::clearInstancePool();
            OpinionTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OpinionTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OpinionTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OpinionTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OpinionTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OpinionQuery
