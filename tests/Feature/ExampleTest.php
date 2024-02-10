<?php

it('returns a successful response', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});
it('Response 200 dari endpoint api v2',function(){
    $response = $this->get('api/v2');

    $response->assertStatus(200);
});
