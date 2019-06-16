<?php

use JsonSchema\Validator;
use classes\APITestCase;
use classes\APITestUtils;

class server_limits extends APITestCase {
	use traits\TestIsResponseCode200;
	use traits\TestIsResponseContentTypeJSON;

	public function setUp(): void {
		$this->set_endpoint_method('GET');
		$this->set_endpoint_uri('general/server_limits.php');
		parent::setUp();
	}

	public function test_is_response_schema_correct(): void {
		$resp = $this->api->call(
			$this->get_endpoint_method(),
			$this->get_endpoint_uri()
		);
		$this->assert_valid_json(
			$resp,
			dirname(__FILE__).'/schemas/server_limits.schema.json'
		);
	}
}