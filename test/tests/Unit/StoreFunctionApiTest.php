<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\ChatWorkService;

class StoreFunctionApiTest extends TestCase{
    public function testAddMessageAndSendMessage()
    {
        // Create a mock of the ChatWorkService class
        $chatWorkServiceMock = $this->getMockBuilder(ChatWorkService::class)
            ->disableOriginalConstructor()
            ->getMock();

        // Set up the expectations for the mock
        $chatWorkServiceMock->expects($this->once())
            ->method('addMessage')
            ->with('Hello, world!');

        $chatWorkServiceMock->expects($this->once())
            ->method('sendMessage');

        // Call the methods under test
        $chatWorkServiceMock->addMessage('Hello, world!');
        $chatWorkServiceMock->sendMessage();
    }
}
