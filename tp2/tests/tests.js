
QUnit.test("pair", function(assert){
    assert.expect(6);
    assert.equal(pair(1),false,"1 est impair");
    assert.equal(pair(2),true,"2 est pair");
    assert.equal(pair(4),true,"4 est pair");
    assert.equal(pair(5),false,"5 est impair");
    assert.equal(pair(34),true,"34 est pair");
    assert.equal(pair(43),false,"43 est impair");
});

QUnit.test("bonjour", function(assert){
    assert.equal(bonjour("toto"),"Bonjour toto","succés toto");
});

QUnit.test("hello test", function( assert){
    assert.ok(1 == "1", "passed!");
});

