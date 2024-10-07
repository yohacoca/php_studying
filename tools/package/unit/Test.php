<?php
declare(strict_types=1);

namespace tools\package\unit;

use PHPUnit\Framework\TestCase;
use tools\package\file\FIle;

// 安装 composer require --dev phpunit/phpunit

class Test extends TestCase
{
    public function testPushAndPop()
    {
        // 初始化一个空数组，作为栈
        $stack = [];

        // 断言：检查栈的初始长度是否为 0
        $this->assertCount(0, $stack);

        // 将字符串 'foo' 推入栈中
        $stack[] = 'foo';

        // 断言：检查栈顶元素是否为 'foo'
        // count($stack) - 1 是栈顶元素的索引，因栈的索引从 0 开始
        $this->assertEquals('foo', $stack[count($stack) - 1]);

        // 断言：检查栈的当前长度是否为 1
        $this->assertCount(1, $stack);

        // 从栈中弹出顶部元素，并断言返回值是否为 'foo'
        $this->assertEquals('foo', array_pop($stack));

        // 断言：检查栈的长度是否为 0，表示栈已为空
        $this->assertCount(0, $stack);
    }


    /**
     * @dataProvider additionProvider
     * @description 数据提供者
     */
    public function additionProvider(): array
    {
        return [
            [1, 1, 2],
            [2, 3, 5],
            [0, 0, 0],
            [-1, 1, 0],
        ];
    }
    public function testAddition($a, $b, $expected): void
    {
        $this->assertEquals($expected, $a + $b);
    }


    public function testUserCreation()
    {
        // 创建 Mock 对象
        $mockRepository = $this->createMock(File::class);
        $mockRepository->expects($this->once())
            ->method('save')
            ->with($this->isInstanceOf(User::class));

        $userService = new UserService($mockRepository);
        $userService->createUser('John Doe', 'john@example.com');
    }

}