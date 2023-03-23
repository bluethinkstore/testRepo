<?php
declare(strict_types=1);

namespace BluethinkInc\ExecuteCommand\Controller\Adminhtml\Index;

use Magento\Framework\Shell;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Shell\CommandRenderer;
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\HttpPostActionInterface;

class RunCommand extends Action implements HttpPostActionInterface
{

    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @var Context
     */
    protected $context;

    /**
     * @var ManagerInterface
     */
    protected $messageManager;

    /**
     * @var RequestInterface
     */
    protected $request;

    /**
     * @var ResultFactory
     */
    protected $resultFactory;

    /**
     * Constructor
     *
     * @param Context $context
     * @param ManagerInterface $messageManager
     * @param RequestInterface $request
     * @param ResultFactory $resultFactory
     */
    public function __construct(
        Context $context,
        ManagerInterface $messageManager,
        RequestInterface $request,
        ResultFactory $resultFactory
    ) {
        $this->shell = new Shell(new CommandRenderer());
        $this->request = $request;
        $this->messageManager = $messageManager;
        $this->resultFactory = $resultFactory;
        parent::__construct($context);
    }
    /**
     * Run Command
     *
     * @return ResultFactory
     */
    public function execute()
    {
        $command = $this->request->getParam('name');
        $command = "php ../$command";
        try {
            $output = $this->shell->execute($command);
            $this->messageManager->addSuccessMessage($output);
        } catch (\Exception $exception) {
            $this->messageManager->addErrorMessage("Command not found");
        }

        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setUrl($this->_redirect->getRefererUrl());
        return $resultRedirect;
    }
}
