import { useEffect, FormEventHandler } from "react";
import GuestLayout from "@/Layouts/GuestLayout";
import { Head, Link, useForm } from "@inertiajs/react";
import {
    Button,
    Checkbox,
    Flex,
    TextField,
    Text,
    Box,
    Link as RadixLink,
    Separator,
    Container,
} from "@radix-ui/themes";
import {
    ArrowRightIcon,
    LockClosedIcon,
    PersonIcon,
} from "@radix-ui/react-icons";

export default function Login({
    status,
    canResetPassword,
}: {
    status?: string;
    canResetPassword: boolean;
}) {
    const { data, setData, post, processing, errors, reset } = useForm({
        email: "",
        password: "",
        remember: false,
    });

    useEffect(() => {
        return () => {
            reset("password");
        };
    }, []);

    const submit: FormEventHandler = (e) => {
        e.preventDefault();

        post(route("login"));
    };

    return (
        <GuestLayout>
            <Head title="Log in" />
            {status && (
                <Box className="mb-4 font-medium text-sm text-green-600">
                    {status}
                </Box>
            )}
            <Container size="1">
                <Box py="9">
                    <form onSubmit={submit}>
                        <Box>
                            <TextField.Root>
                                <TextField.Slot>
                                    <PersonIcon height="16" width="16" />
                                </TextField.Slot>
                                <TextField.Input
                                    placeholder="Email"
                                    type="email"
                                    size="3"
                                    onChange={(e) =>
                                        setData("email", e.target.value)
                                    }
                                    autoComplete="email"
                                />
                            </TextField.Root>
                        </Box>

                        <Box className="mt-4">
                            <TextField.Root>
                                <TextField.Slot>
                                    <LockClosedIcon height="16" width="16" />
                                </TextField.Slot>
                                <TextField.Input
                                    placeholder="Password"
                                    type="password"
                                    size="3"
                                    onChange={(e) =>
                                        setData("password", e.target.value)
                                    }
                                />
                            </TextField.Root>
                        </Box>

                        <Box className="mt-4">
                            {canResetPassword && (
                                <Link href={route("password.request")}>
                                    <RadixLink size="2">
                                        Forgot your password?
                                    </RadixLink>
                                </Link>
                            )}
                        </Box>

                        <Flex
                            direction="row"
                            gap="2"
                            align={"center"}
                            justify={"between"}
                            mt="6"
                        >
                            <Text as="label" size="2">
                                <Flex gap="2">
                                    <Checkbox
                                        name="remember"
                                        checked={data.remember}
                                        onCheckedChange={(checkedState) =>
                                            setData("remember", !!checkedState)
                                        }
                                    />
                                    Remember me
                                </Flex>
                            </Text>
                            <Button
                                className="ms-4"
                                disabled={processing}
                                size={"3"}
                            >
                                Log in
                            </Button>
                        </Flex>

                        <Separator mt="4" mb="6" size="4" />

                        <Flex
                            className="text-right"
                            direction="row"
                            gap="2"
                            align={"center"}
                            justify={"between"}
                        >
                            <Text size="2">Don't have an account yet?</Text>
                            <Link href={route("register")}>
                                <RadixLink size="2">
                                    <Button size="2" variant="surface">
                                        Register <ArrowRightIcon />
                                    </Button>
                                </RadixLink>
                            </Link>
                        </Flex>
                    </form>
                </Box>
            </Container>
        </GuestLayout>
    );
}
