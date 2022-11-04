interface Package{
    public function encode();
    public function decode($packageCode);
    public function getSetName();
    public function getSubsetType();
    public function setSubsetType();
    public function getChoicesArray();
}