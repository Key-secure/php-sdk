<?php
namespace keysecure\custody\client;

interface CustodyApi
{
    /**
     * register mobile number
     * @param $country country code
     * @param $mobile Phone number
     * @return User UID after registration
     */
    public function CreateMobileUser($country, $mobile) ;

    /**
     * Register account by  Email
     * @param $email
     * @return int User UID after registration
     */
    public function CreateEmailUser($email);

    /**
     *  Get registered user information
     * @param $country
     * @param $mobile
     * @return UserInfo
     */
    public function GetUserInfoByMobile($country, $mobile);

    /**
     * Get registered user information
     * @param $email
     * @return UserInfo
     */
    public function GetUserInfoByEmail($email);

    /**
     *  obtain list of supported coins
     * @return Coin
     */
    public function GetCoinList();

    /**
     *  obtain user account balance by coins
     * @param $uid
     * @param $symbol
     * @return Balance
     */
    public function GetBalanceByUidAndSymbol($uid, $symbol);

    /**
     *  obtain merchants account balance after assets consolidation
     * @param $symbol
     * @return collect balnce
     */
    public function GetCollectBalanceBySymbol($symbol);

    /**
     *  obtain coin deposit address
     * @param $uid
     * @param $symbol
     * @return deposit address
     */
    public function GetDepositAddress($uid, $symbol);

    /**
     *  Initiate a withdrawal
     * @param $requestId Merchant order unique identifier, used to distinguish repeated withdrawals
     * @param $fromCustodyUid  CreateMobileUser The uid returned by the interface
     * @param $withdrawAddress Withdrawal address
     * @param $withdrawAmount Withdrawal Amount
     * @param $withdrawSymbol Withdrawal coin
     * @return custody Platform withdrawal id
     */
    public function Withdraw($requestId, $fromCustodyUid, $withdrawAddress, $withdrawAmount, $withdrawSymbol);

    /**
     * Sync withdrawal record
     * @param int $lastCustodyId  Custody Platform withdrawal id,Returns 100 more than last custody id
     * @return withdraw list
     */
    public function SyncWithdrawList($lastCustodyId = 0);

    /**
     *  Batch query withdrawal records
     * @param array $requestIdList
     * @return mixed
     */
    public function WithdrawBatchList($requestIdList = array());

    /**
     * Sync deposit record
     * @param int $lastCustodyId
     * @return mixed
     */
    public function SyncDepositList($lastCustodyId = 0);

    /**
     *  Batch query deposit records
     * @param array $requestIdList
     * @return mixed
     */
    public function DepositBatchList($requestIdList = array());
}