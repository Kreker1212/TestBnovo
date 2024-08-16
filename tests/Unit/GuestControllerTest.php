<?php

namespace Tests\Unit;

use App\Http\Controllers\GuestController;
use App\Http\Requests\StoreGuestRequest;
use App\Http\Requests\UpdateGuestRequest;
use App\Service\GuestService;
use Illuminate\Http\JsonResponse;
use Mockery;
use PHPUnit\Framework\TestCase;

class GuestControllerTest extends TestCase
{
    protected $guestServiceMock;

    protected function setUp(): void
    {
        parent::setUp();
        $this->guestServiceMock = Mockery::mock(GuestService::class);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function testIndex(): void
    {
        $mockedResponse = new JsonResponse(['data' => ['guest1', 'guest2']], 200);
        $this->guestServiceMock->shouldReceive('index')->once()->andReturn($mockedResponse);

        $controller = new GuestController($this->guestServiceMock);

        // Запускаем метод контроллера и проверяем результат
        $response = $controller->index();
        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(['data' => ['guest1', 'guest2']], $response->getData(true));
    }

    public function testShow(): void
    {
        $mockedResponse = new JsonResponse(['id' => 1, 'name' => 'John Doe'], 200);
        $this->guestServiceMock->shouldReceive('show')->with(1)->once()->andReturn($mockedResponse);

        $controller = new GuestController($this->guestServiceMock);

        $response = $controller->show(1);
        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(['id' => 1, 'name' => 'John Doe'], $response->getData(true));
    }

    public function testStore(): void
    {
        $request = Mockery::mock(StoreGuestRequest::class);
        $mockedResponse = new JsonResponse(['id' => 1, 'name' => 'John Doe'], 201);

        $this->guestServiceMock->shouldReceive('store')->with($request)->once()->andReturn($mockedResponse);

        $controller = new GuestController($this->guestServiceMock);

        $response = $controller->store($request);
        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals(201, $response->getStatusCode());
        $this->assertEquals(['id' => 1, 'name' => 'John Doe'], $response->getData(true));
    }

    public function testUpdate(): void
    {
        $request = Mockery::mock(UpdateGuestRequest::class);
        $mockedResponse = new JsonResponse(['id' => 1, 'name' => 'John Doe Updated'], 200);

        $this->guestServiceMock->shouldReceive('update')->with($request, 1)->once()->andReturn($mockedResponse);

        $controller = new GuestController($this->guestServiceMock);

        $response = $controller->update($request, 1);
        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(['id' => 1, 'name' => 'John Doe Updated'], $response->getData(true));
    }

    public function testDestroy(): void
    {
        $mockedResponse = new JsonResponse(null, 204);
        $this->guestServiceMock->shouldReceive('destroy')->with(1)->once()->andReturn($mockedResponse);

        $controller = new GuestController($this->guestServiceMock);

        $response = $controller->destroy(1);
        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals(204, $response->getStatusCode());
    }
}
